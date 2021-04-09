@component('mail::message')
Enquiry Form<br>
My name is, {{$details['full_name']}}<br>
My contact number is: {{$details['phone']}}.<br>
Product: {{$details['message']}}.<br>
My address is: {{$details['address']}}.<br>
@component('mail::button', ['url' => 'gws.gwsmed.com'])
Click Here
@endcomponent
Gwsmed
@endcomponent
