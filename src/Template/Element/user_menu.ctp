<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse"  data-auto-scroll="false">
	<ul class="page-sidebar-menu" data-keep-expanded="false" data-slide-speed="200" style="margin-top: 20px;">
		<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
		<li class="sidebar-toggler-wrapper">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<!-- <div class="sidebar-toggler">
			</div> -->
			<!-- END SIDEBAR TOGGLER BUTTON -->
		</li>

		<?php 
			function printMenu($menu,$url)
			{
				if(empty($menu['children']))
				{
					echo "
						<li>
							<a href='".$url->build(['controller'=>$menu['controller'],'action'=>$menu['action']])."'>
								<i class='".$menu['icon_class_name']."'></i>
								<span class='title'>".$menu['menu_name']."</span>
							</a>
						</li>
					";
				}
				else
				{
					echo "
						<li>
							<a href='javascript:;''>
								<i class='".$menu->icon_class_name."'></i>
								<span class='title'>".$menu->menu_name."</span>
								<span class='arrow '></span>
							</a>
							<ul class='sub-menu'>
						</li>
					";

					foreach ($menu->children as $key => $child) {
						if(empty($child->children))
						{
							echo "
								<li>
									<a href='".$url->build(['controller'=>$child->controller,'action'=>$child->action])."'>
										<i class='".$child->icon_class_name."'></i>
										<span class='title'>".$child->menu_name."</span>
									</a>
								</li>
							";
						}
						else
							printMenu($child,$url);
					}

					echo "</ul></li>";
				}
			}
		?>

		<?php foreach ($menus as $key => $menu): ?>
			<?php printMenu($menu,$this->Url); ?>
		<?php endforeach; ?>
		<li>
			<a class="menu_link" href="<?= $this->Url->build(['controller'=>'Users','action'=>'logout']) ?>">
			<i class="icon-logout"></i>
			<span class="title">Logout </span>
			</a>
		</li>
	</ul>
</div>