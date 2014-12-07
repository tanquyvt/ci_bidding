<?php 
	echo form_fieldset('User Login', '');
	echo form_open('verifysignin', '','');

	echo form_label('Email', 'email'); echo form_input('email', '');
	echo form_label('Password', 'password'); echo form_password('password', '');

	echo form_submit('', 'Sign in');

	echo form_close();
	echo form_fieldset_close();

	echo validation_errors();
 ?>