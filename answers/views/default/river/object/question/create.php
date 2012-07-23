<?php
/**
 * Add a new question river view
 */

$performed_by = get_entity($vars['item']->subject_guid);
$object = get_entity($vars['item']->object_guid);
$url = $object->getURL();

$item = $vars['item'];
$timestamp = elgg_view_friendly_time($item->getPostedTime());

$url = "<div class='elgg-river-summary'><a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
$string = sprintf(elgg_echo("question:river:created"), $url) . " ";
$string .= "<a href=\"" . $object->getURL() . "\">" . $object->title . "</a>";
$string .= '<span class="elgg-river-timestamp"> ' . $timestamp . ' </span></div>';

echo elgg_view('page/components/image_block', array(
	'image' => elgg_view('river/elements/image', $vars),
	'body' => $string,
	'class' => 'elgg-river-item',
));