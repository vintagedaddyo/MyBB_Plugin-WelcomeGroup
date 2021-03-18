<?php
/**
 * This file is part of Welcome Group plugin for MyBB.
 * Copyright (C) Vintagedaddyo
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

// disallow direct access to this file

if(!defined("IN_MYBB"))
{
	die("This file cannot be accessed directly.");
}

// add hooks

$plugins->add_hook("global_intermediate", "welcomegroup_global_run");


function welcomegroup_info()
{
	return array(
		"name"			=> "Welcome Group",
		"description"	=> "Displays usergroup color for username in welcomeblock",
		"website"		=> "https://community.mybb.com",
		"author"		=> "Vintagedaddyo",
		"authorsite"	=> "https://github.com/vintagedaddyo",
		"version"		=> "1.0",
		"guid" 			=> "",
		"compatibility"	=> "18*"
	);
}

function welcomegroup_global_run()
{
	global $db, $mybb, $lang, $lastvisit;

  if($mybb->user['uid'] != 0)
  {
	// Format the welcome back message

     $welcome_back_user = format_name($mybb->user['username'], $mybb->user['usergroup'], $mybb->user['displaygroup']);
     $lang->welcome_back = $lang->sprintf($lang->welcome_back, build_profile_link($welcome_back_user, $mybb->user['uid']), $lastvisit);
   }
}

?>