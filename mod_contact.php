<?php

defined('_JEXEC') or die;

$render = function() use ($params) {

    if (!$app = @include(JPATH_ADMINISTRATOR . '/components/com_widgetkit/widgetkit-app.php')) {
        return;
    }

	$salon = $params->get('salon');
	$kraj = $params->get('kraj');
	$telefon = $params->get('telefon');
	$email = $params->get('email');
	$delavnik = $params->get('delavnik');

    $output = $app->renderWidget(json_decode($params->get('widgetkit', '[]'), true));
    echo '<ul class="uk-list uk-list-saloni uk-margin-bottom">';
	echo '<li class="ikona-salon"><span>'.$salon.',<br>'.$kraj.'</span></li>';
	echo '<li class="ikona-telefon"><span>'.$telefon.'</span></li>';
	echo '<li class="ikona-email"><a href="mailto:'.$email.'"><span>'.$email.'</span></a></li>';
	echo '<li class="ikona-delavnik"><span>'.$delavnik.'</span></li>';
	echo '</ul>';
    echo $output === false ? $app['translator']->trans('Could not load widget') : $output;
};

return $render();
