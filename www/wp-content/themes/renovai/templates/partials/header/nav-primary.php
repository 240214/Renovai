<?php
use Digidez\Functions;
use Digidez\Theme;
use Digidez\Helper;

$menu = Theme::get_menu_tree('primary');
#Helper::_debug($menu); exit;
?>
<nav class="navbar navbar-expand-md headerNavBar p-0">
	<a class="header-logo p-mobile" href="<?=site_url('/');?>" title="<?=get_bloginfo('title');?>"></a>
	<button class="p-mobile navbar-toggler collapsed" type="button" data--toggle="collapse" data-trigger="js_action_click" data-action="toggle_mobile_nav" data-target=".headerNavBar" data-nav-target=".headerNav" aria-controls="headerNavBar" aria-expanded="false"><span></span><span></span><span></span></button>
	<div class="collapse navbar-collapse headerNav">
		<?php if(!empty($menu)):?>
			<ul class="navbar-nav header-nav text-center text-md-left justify-content-center justify-content-start">
				<?php foreach($menu as $k => $level_1_item):?>
					<?php
					$has_dropdown = false;
					$level_1_item_a_class = $level_1_item_li_class = [];
					
					$level_1_item_a_class[] = empty($level_1_item['classes']) ? 'nav-link' : $level_1_item['classes'];
					$level_1_item_li_class[] = 'nav-item';
					if(strstr($level_1_item['classes'], 'btn-light') !== false){
						$level_1_item_li_class[] = 'btn-static';
						$level_1_item_li_class[] = 'mr-0';
						$level_1_item_li_class[] = 'pr-0';
					}
					if(strstr($level_1_item['classes'], 'btn-secondary') !== false){
						$level_1_item_li_class[] = 'btn-fixed';
						$level_1_item_li_class[] = 'mr-0';
						$level_1_item_li_class[] = 'pr-0';
					}
					if(strstr($level_1_item['classes'], 'btn-primary') !== false){
						$level_1_item_li_class[] = 'mr-0';
						$level_1_item_li_class[] = 'pr-0';
						$level_1_item_li_class[] = 'd-md-none';
						$level_1_item_li_class[] = 'mt-3';
					}
					if(isset($level_1_item['items']) && count($level_1_item['items']) > 0){
						$has_dropdown = true;
						$level_1_item_a_class[] = 'dropdown-toggle';
						$level_1_item_li_class[] = 'dropdown';
					}
					$level_1_item_a_class[] = $level_1_item['active_class'];
					$level_1_item_li_class[] = $level_1_item['active_class'];
					
					$level_1_item_a_class = implode(' ', $level_1_item_a_class);
					$level_1_item_li_class = implode(' ', $level_1_item_li_class);
					?>
					<li class="<?=$level_1_item_li_class;?>">
						<a class="<?=$level_1_item_a_class;?>" href="<?=$level_1_item['url'];?>" target="<?=$level_1_item['target'];?>"><?=$level_1_item['name'];?></a>
		
						<?php if($has_dropdown):?>
							<ul class="dropdown-menu">
								<?php foreach($level_1_item['items'] as $level_2_item):?>
									<li class="<?php if(isset($level_2_item['items']) && count($level_2_item['items']) > 0):?>dropdown<?php endif;?>">
										<a href="<?=$level_2_item['url'];?>" class="dropdown-item <?=$level_2_item['classes'];?> <?php #=$level_2_item['active_class'];?>"><?=$level_2_item['name'];?></a>
										<?php if(isset($level_2_item['items']) && count($level_2_item['items']) > 0):?>
										<div class="submenu">
											<ul class="dropdown-menu">
												<?php foreach($level_2_item['items'] as $level_3_item):?>
													<li><a href="<?=$level_3_item['url'];?>" class="dropdown-item <?=$level_3_item['classes'];?> <?php #=$level_3_item['active_class'];?>"><?=$level_3_item['name'];?></a></li>
												<?php endforeach;?>
											</ul>
										</div>
										<?php endif;?>
									</li>
								<?php endforeach;?>
							</ul>
						<?php endif;?>
		
					</li>
				<?php endforeach;?>
				<?php do_action('add_logout_item');?>
			</ul>
		<?php endif;?>
	</div>
</nav>