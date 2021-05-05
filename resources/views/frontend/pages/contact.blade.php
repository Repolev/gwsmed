@extends('frontend.layouts.master')

@section('content')

    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
    </div>
        <div class="row py-2" style="border-bottom: 1px solid #f5f5f5;">
            <div class="col-12">
                <div class="container">
                    <div class="cv-breadcrumb-box">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            |
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <!-- breadcrumb end -->
    <!-- conatact start -->
    <div class="cv-conatact my-3">
        <div class="container">

            <div class="row">
                <div class="col-lg-4">
                    <div class="cv-contact-detail">
                        <h2 class="cv-sidebar-title pb-5">Contact Info</h2>
                        <ul>
                            <li>
                                <div class="cv-contact-icon">
                                    <img src={{ asset ('frontend/assets/images/Flag-1-64x42.png')}}>
                                </div>
                                <div class="cv-contact-text">
                                    <h6>India Office</h6>
                                     <p><i class="fa fa-phone"></i> +91-124-4915548 </p>
                                     <p><i class="fa fa-envelope"></i> info@gwsmed.com </p>
                                     <p><i class="fa fa-envelope"></i> gwssurgicals@gmail.com </p>
                                    <!--<p>{{\App\Models\Setting::value('phone')}}</p>-->
                                </div>
                            </li>
                            <li>
                                <div class="cv-contact-icon">
                                    <img src={{ asset ('frontend/assets/images/uk-flag-64x32.jpg')}} style="height: 1.3rem;">
                                </div>
                                <div class="cv-contact-text">
                                    <h6>UK Office</h6>
                                     <p><i class="fa fa-envelope"></i> UKoffice@gwsmed.com </p>
                                     <p><i class="fa fa-map-marker"></i> 59 Kempton Road, <br> London, E6 2LG </p>
                                    
                                </div>
                            </li>
                            <li class="d-none">
                                <div class="cv-contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M10.688,95.156C80.958,154.667,204.26,259.365,240.5,292.01c4.865,4.406,10.083,6.646,15.5,6.646
                                            c5.406,0,10.615-2.219,15.469-6.604c36.271-32.677,159.573-137.385,229.844-196.896c4.375-3.698,5.042-10.198,1.5-14.719
                                            C494.625,69.99,482.417,64,469.333,64H42.667c-13.083,0-25.292,5.99-33.479,16.438C5.646,84.958,6.313,91.458,10.688,95.156z"></path>
                                        <path d="M505.813,127.406c-3.781-1.76-8.229-1.146-11.375,1.542c-46.021,39.01-106.656,90.552-152.385,129.885
                                            c-2.406,2.063-3.76,5.094-3.708,8.271c0.052,3.167,1.521,6.156,4,8.135c42.49,34.031,106.521,80.844,152.76,114.115
                                            c1.844,1.333,4.031,2.01,6.229,2.01c1.667,0,3.333-0.385,4.865-1.177c3.563-1.823,5.802-5.49,5.802-9.49V137.083
                                            C512,132.927,509.583,129.146,505.813,127.406z"></path>
                                        <path d="M16.896,389.354c46.25-33.271,110.292-80.083,152.771-114.115c2.479-1.979,3.948-4.969,4-8.135
                                            c0.052-3.177-1.302-6.208-3.708-8.271C124.229,219.5,63.583,167.958,17.563,128.948c-3.167-2.688-7.625-3.281-11.375-1.542
                                            C2.417,129.146,0,132.927,0,137.083v243.615c0,4,2.24,7.667,5.802,9.49c1.531,0.792,3.198,1.177,4.865,1.177
                                            C12.865,391.365,15.052,390.688,16.896,389.354z"></path>
                                        <path d="M498.927,418.375c-44.656-31.948-126.917-91.51-176.021-131.365c-4-3.26-9.792-3.156-13.729,0.24
                                            c-9.635,8.406-17.698,15.49-23.417,20.635c-17.563,15.854-41.938,15.854-59.542-0.021c-5.698-5.135-13.76-12.24-23.396-20.615
                                            c-3.906-3.417-9.708-3.521-13.719-0.24c-48.938,39.719-131.292,99.354-176.021,131.365c-2.49,1.792-4.094,4.552-4.406,7.604
                                            c-0.302,3.052,0.708,6.083,2.802,8.333C19.552,443.01,30.927,448,42.667,448h426.667c11.74,0,23.104-4.99,31.198-13.688
                                            c2.083-2.24,3.104-5.271,2.802-8.323C503.021,422.938,501.417,420.167,498.927,418.375z"></path>
                                    </svg>
                                </div>
                                <div class="cv-contact-text">
                                    <h3>Email</h3>
                                    <p>{{\App\Models\Setting::value('email')}}</p>

                                </div>
                            </li>
                            <li>
                                
                                <div class="cv-contact-text">
                                    <h6>Corporate office</h6>
                                    <p><i class="fa fa-map-pin"></i> {{\App\Models\Setting::value('address')}}</p>

                                </div>
                            </li>
                             <li>
                                
                                <div class="cv-contact-text">
                                    <h6>Manufacturing Unit</h6> 
                                    <p><i class="fa fa-map"></i> G259, Sector-3 Bawana Industrial Area Delhi-110039</p> <br>
                                    <p><i class="fa fa-map-pin"></i> Plot No.38, Sector-7 Sidcul Industrial Area Haridwar, Uttarakhand-249403</p>

                                </div>
                            </li>
                            <!--<li>-->
                            <!--    <div class="cv-contact-icon">-->
                            <!--       <i class="fas fa-clock text-white"></i>-->
                            <!--    </div>-->
                            <!--    <div class="cv-contact-text">-->
                            <!--        <h3>Open Time</h3>-->
                            <!--        <p>{{\App\Models\Setting::value('office_time')}}</p>-->

                            <!--    </div>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="cv-contact-form">
                        <h2 class="cv-sidebar-title">Get a quote</h2>
                        <form action="{{route('contact.submit')}}" method="post">
                            {{ csrf_field() }}
                            <input type="text" placeholder="Full Name*" name="full_name" id="full_name" class="require"/>
                             <input type="text" placeholder="Company's Name*" name="company_name" id="company_name" class="require"/>
                            <input type="text"  placeholder="Email*" name="email" id="email" class="require" data-valid="email" data-error="Email should be valid."/>
                             <input type="number" placeholder="Phone number with country code*" name="phone" id="phone_no" class="require"/>
                             <select class="country-options" name="country">
                                 <option>Select Country</option>
                                 <option value="India">India</option>
                                 <option value="Pakistan">Pakistan</option>
                                 <option value="Sri Lanka">Sri Lanka</option>
                                 <option value="Bhuta">Bhutan</option>
                                 <option value="Nepal">Nepal</option>
                                 <option value="Afghanistan">Afghanistan</option>
                                 <option value="Bangladesh">Bangladesh</option>
                                 <option value="China">China</option>
                             </select>
                             <br>
                              <input type="text" placeholder="City Name*" name="city" id="city_name" class="require"/>
                            <input type="text"  placeholder="Enter your subject" name="subject" id="subject" class="require"/>
                            <textarea placeholder="Message here" name="message" id="message" class="require"></textarea>
                            <button type="submit" class="cv-btn submitForm">submit</button>
                            <div class="response"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- conatact end -->
    <!-- iframe start -->
    <div class="cv-contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d449127.0072074519!2d77.068109!3d28.425148!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc932b58d70526b94!2sOcus%20Quantum!5e0!3m2!1sen!2sus!4v1618142158373!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <!-- iframe end -->


@endsection
