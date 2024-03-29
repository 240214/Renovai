<?php
use Digidez\Functions;
use Digidez\Helper;

#Helper::_debug($section_data);

?>
<section id="<?=$section_name;?>-section" class="bg-secondary py-4 pt-lg-9 pb-lg-7 itmmb-section sm-toggle-position">
	<div class="container text-center">
		<div class="text-white mb-4">
			<p class="title"><?=$section_data['section_title'];?></p>
			<p class="subtitle"><?=$section_data['section_subtitle'];?></p>
		</div>
		<?=Functions::render_section_button($section_data['section_button'], ['class' => 'btn btn-light shadow d-inline-block d-lg-none']);?>
		<?=Functions::render_section_button($section_data['section_button'], ['class' => 'btn btn-light shadow btn-lg d-none d-lg-inline-block']);?>
	</div>
</section>
