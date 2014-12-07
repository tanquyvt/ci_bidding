<?php 
	echo form_fieldset('Persional Information', '');
	echo form_open('verifysignup', '', '');

	echo form_label('First Name', 'first_name'); echo form_input('first_name', '');
	echo form_label('Last Name', 'last_name'); echo form_input('last_name', '');
	echo form_label('Email', 'email'); echo form_input('email', '');
	echo form_label('Password', 'password'); echo form_password('password', '');
	echo form_submit('', 'Sign up');

	echo form_close();
	echo form_fieldset_close();

	echo validation_errors();
 ?>