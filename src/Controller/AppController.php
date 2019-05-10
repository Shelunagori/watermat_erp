<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    
    public function initialize()
    {
        parent::initialize();

        FrozenTime::setToStringFormat('hh:mm a');  // For any immutable DateTime
        FrozenDate::setToStringFormat('dd-MMM-yyyy');  // For any immutable Date
        FrozenDate::setJsonEncodeFormat('dd-MMM-yyyy');

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $Help = $this->loadComponent('Help');
        $SMS = $this->loadComponent('Sms');
        $Auth = $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'userModel' => 'Users'
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);
            
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        if($this->request->getParam('_ext') == 'json')
        {
            $this->Auth->allow([$this->request->getParam('action')]);
        }

        $this->session = $this->getRequest()->getSession();
        
        // maintain referer page
        $refer = $this->session->read('refer');
        if($refer)
        {
            array_push($refer,$this->referer());
            array_shift($refer);
            $this->session->write('refer',$refer);
        }

        //User Rights
        $menus = $this->session->read('menus');
        if(!$menus)
        {
            $portalIds = $this->Auth->user('portal_users.0.ids');
            $menu_ids = null;

            if($portalIds)
            {
                $this->loadModel('UserRights');
                $portal_menus = $this->UserRights->find()->select(['ids'=>'GROUP_CONCAT(menu_ids)'])->where(['portal_id in ('.$portalIds.')']);
                if(!$portal_menus->isEmpty())
                    $menu_ids = $portal_menus->first()->ids;
            }
            
            $this->loadModel('Menus');
            if($menu_ids)
            {
                $menus = $this->Menus->find('threaded')->where(['id in ('.$menu_ids.')']);
                $this->session->write('menus',$menus->toArray());
            }
        }

        $this->set(compact('Auth','Help','SMS','menus'));
    }
}
