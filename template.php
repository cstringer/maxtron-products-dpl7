<?php

function maxtron_breadcrumb ($variables)
  {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb))
    {
    if (stristr ($breadcrumb[0], "home"))
      {
      array_shift ($breadcrumb);
      }
    array_push ($breadcrumb, '');
    $output = implode(' / ', $breadcrumb);
    return $output;
    }
  }


function maxtron_js_alter(&$js)
	{
   $js['misc/jquery.js']['data'] = 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js';

   // Adding this ensures that the UI functionality gets added at all times!  Even when logged out of the site, since we have functionality on the site that requires this when logged out!
   if (!isset($js['misc/ui/jquery.ui.core.min.js']))
    	{
	   drupal_add_js('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js');
    	}
   else
		{
		$js['misc/ui/jquery.ui.core.min.js']['data'] = 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js';
		}
	}

/*
function maxtron_menu_link__main_menu($variables) {
  $output = "";
  foreach ($variables as $link) {
   //$output .= l($link['title'], $link['href'], $link);
  }
  return $output;
}
*/

function maxtron_preprocess_page(&$vars)
	{
	if (isset ($vars['node']->type))
		{
		if (is_array($vars['theme_hook_suggestions']))
			{
			$vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
			}
		if (isset ($vars['tabs']) && $vars['node']->type == 'web_prompter')
			{
			$vars['tabs']['#primary'][0]['#link']['title'] = 'Prompter';
			//$vars['tabs']['#primary'][1]['#link']['title'] = 'File';
			unset ($vars['tabs']['#primary'][2]);
			unset ($vars['tabs']['#primary'][3]);
			}
		}
	if (isset ($vars['tabs']))
		{
		if (isset ($vars['tabs']['#primary'][0]) && $vars['logged_in'] &&
			strstr ($vars['tabs']['#primary'][0]['#link']['href'], 'user'))
			{
			$vars['tabs']['#primary'][0]['#link']['title'] = 'User Profile';
			$vars['tabs']['#primary'][1]['#link']['title'] = 'Edit Profile';
			$vars['tabs']['#primary'][2]['#link']['title'] = 'Content';
			}
		}
	}

?>
