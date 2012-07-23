<?php
/**
 * Comment on a question/answer river view
 */

$performed_by = get_entity($vars['item']->subject_guid);
$object = get_entity($vars['item']->object_guid);
$item = $vars['item'];
$timestamp = elgg_view_friendly_time($item->getPostedTime());

$type = $object->getSubType();
$person_url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";

$string = "<div class='elgg-river-summary'>";
$string .= sprintf(elgg_echo("question:river:comment:".$type),$person_url) . " ";
$object_title = $type == 'answer' ? get_question_for_answer($object)->title : $object->title;
$string .= "<a href=\"" . $object->getURL() . "\">" . $object_title . "</a>";
$string .= '<span class="elgg-river-timestamp"> ' . $timestamp . ' </span></div>';


echo elgg_view('page/components/image_block', array(
	'image' => elgg_view('river/elements/image', $vars),
	'body' => $string,
	'class' => 'elgg-river-item',
));
