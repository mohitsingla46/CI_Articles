<?php

$config = [
	'admin_login' => [
						[
							'field' => 'email',
							'label' => 'Email ID',
							'rules' => 'trim|required|valid_email'
						],
						[
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'trim|required'
						]
					 ],
	'add_article_rules' => [
								[
									'field' => 'title',
									'label' => 'Article Title',
									'rules' => 'required'
								],
								[
									'field' => 'body',
									'label' => 'Article Body',
									'rules' => 'required'
								]
						   ]

];