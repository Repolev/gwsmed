@component('mail::message')
Enquiry Form<br>
My name is, {{$details['full_name']}}<br>
My contact number is: {{$details['phone']}}.<br>
Message: {{$details['message']}}.<br>
My address is: {{$details['address']}}.<br>
Categories:
<ul>
@foreach($details['categories'] as $category)
<li>{{ $category->title }}</li>
@endforeach
</ul>
@component('mail::button', ['url' => 'gws.gwsmed.com'])
Click Here
@endcomponent
Gwsmed
@endcomponent

