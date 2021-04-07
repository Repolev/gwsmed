@extends('frontend.layouts.master')

@section('content')

    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>My account</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- account start -->
    <div class="cv-account spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cv-account-box">
                        <div class="cv-account-img">
                            @if($user->image)
                                <img src="{{asset($user->image_path)}}" alt="image" class="img-fluid"/>
                            @else
                                <img src="https://via.placeholder.com/240x240" alt="image" class="img-fluid"/>
                            @endif
                            <div class="cv-profile-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.25 55.25">
                                    <path d="M52.618,2.631c-3.51-3.508-9.219-3.508-12.729,0L3.827,38.693C3.81,38.71,3.8,38.731,3.785,38.749
                                        c-0.021,0.024-0.039,0.05-0.058,0.076c-0.053,0.074-0.094,0.153-0.125,0.239c-0.009,0.026-0.022,0.049-0.029,0.075
                                        c-0.003,0.01-0.009,0.02-0.012,0.03l-3.535,14.85c-0.016,0.067-0.02,0.135-0.022,0.202C0.004,54.234,0,54.246,0,54.259
                                        c0.001,0.114,0.026,0.225,0.065,0.332c0.009,0.025,0.019,0.047,0.03,0.071c0.049,0.107,0.11,0.21,0.196,0.296
                                        c0.095,0.095,0.207,0.168,0.328,0.218c0.121,0.05,0.25,0.075,0.379,0.075c0.077,0,0.155-0.009,0.231-0.027l14.85-3.535
                                        c0.027-0.006,0.051-0.021,0.077-0.03c0.034-0.011,0.066-0.024,0.099-0.039c0.072-0.033,0.139-0.074,0.201-0.123
                                        c0.024-0.019,0.049-0.033,0.072-0.054c0.008-0.008,0.018-0.012,0.026-0.02l36.063-36.063C56.127,11.85,56.127,6.14,52.618,2.631z
                                        M51.204,4.045c2.488,2.489,2.7,6.397,0.65,9.137l-9.787-9.787C44.808,1.345,48.716,1.557,51.204,4.045z M46.254,18.895l-9.9-9.9
                                        l1.414-1.414l9.9,9.9L46.254,18.895z M4.961,50.288c-0.391-0.391-1.023-0.391-1.414,0L2.79,51.045l2.554-10.728l4.422-0.491
                                        l-0.569,5.122c-0.004,0.038,0.01,0.073,0.01,0.11c0,0.038-0.014,0.072-0.01,0.11c0.004,0.033,0.021,0.06,0.028,0.092
                                        c0.012,0.058,0.029,0.111,0.05,0.165c0.026,0.065,0.057,0.124,0.095,0.181c0.031,0.046,0.062,0.087,0.1,0.127
                                        c0.048,0.051,0.1,0.094,0.157,0.134c0.045,0.031,0.088,0.06,0.138,0.084C9.831,45.982,9.9,46,9.972,46.017
                                        c0.038,0.009,0.069,0.03,0.108,0.035c0.036,0.004,0.072,0.006,0.109,0.006c0,0,0.001,0,0.001,0c0,0,0.001,0,0.001,0h0.001
                                        c0,0,0.001,0,0.001,0c0.036,0,0.073-0.002,0.109-0.006l5.122-0.569l-0.491,4.422L4.204,52.459l0.757-0.757
                                        C5.351,51.312,5.351,50.679,4.961,50.288z M17.511,44.809L39.889,22.43c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
                                        L16.097,43.395l-4.773,0.53l0.53-4.773l22.38-22.378c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0L10.44,37.738
                                        l-3.183,0.354L34.94,10.409l9.9,9.9L17.157,47.992L17.511,44.809z M49.082,16.067l-9.9-9.9l1.415-1.415l9.9,9.9L49.082,16.067z"></path>
                                </svg>
                                <input type="file" name="myfile">
                            </div>
                        </div>
                        <div class="cv-account-text">
                            <div class="cv-ac-user-name">
                                <h2>{{ucfirst($user->full_name)}} <span>{{ucfirst($user->designation)}}</span></h2>
                            </div>
                            <div class="cv-account-info">
                                <ul>
                                    <li>
                                        <p>Mobile no. :</p>
                                        <p>{{$user->phone}}</p>
                                    </li>
                                    <li>
                                        <p>Email :</p>
                                        <p>{{$user->email}}</p>
                                    </li>
                                    <li>
                                        <p>Permanent Address :</p>
                                        <p>{{$user->permanent_address}}</p>
                                    </li>
                                    <li>
                                        <p>Shipping Address :</p>
                                        <p>{{$user->shipping_address}}</p>
                                    </li>
                                </ul>
                            </div>
                            <button class="cv-btn cv-edit-click">edit account</button>
                            <button class="cv-btn cv-close-edit">close edit</button>
                            <div class="cv-ac-info-edit" id="cv-edit-redirect">
                                <form action="{{route('update.account',$user->id)}}" method="post">
                                    @csrf
                                    <ul>
                                        <li>
                                            <p>Name :</p>
                                            <input type="text" name="full_name" placeholder="Full Name" value="{{$user->full_name}}">
                                            @error('full_name')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </li>
                                        <li>
                                            <p>Designation :</p>
                                            <input type="text" name="designation" value="{{$user->designation}}" placeholder="Designation">
                                            @error('designation')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </li>
                                        <li>
                                            <p>Mobile no. :</p>
                                            <input type="number" name="phone" value="{{$user->phone}}" placeholder="Mobile Number">
                                            @error('phone')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror

                                        </li>
                                        <li>
                                            <p>Email :</p>
                                            <input type="email" disabled placeholder="Email Address" name="email" value="{{$user->email}}">
                                            @error('email')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </li>
                                        <li>
                                            <p>Permanent Address :</p>
                                            <input type="text" name="permanent_address" placeholder="Permanent Address" value="{{$user->permanent_address}}">
                                            @error('permanent_address')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </li>
                                        <li>
                                            <p>Shipping Address :</p>
                                            <input type="text" name="shipping_address" placeholder="Shipping Address" value="{{$user->shipping_address}}">
                                            @error('shipping_address')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </li>
                                    </ul>
                                    <button type="submit" class="cv-btn">Save changes</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="cv-last-order spacer-top-less">
                        <div class="cv-heading">
                            <h1>Your last orders</h1>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <table>
                            <thead>
                            <tr>
                                <th>Product image</th>
                                <th>Product name</th>
                                <th>unit price</th>
                                <th>Quantity</th>
                                <th>Purchase date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cv-cart-img">
                                        <img src="https://via.placeholder.com/60x60" alt="image" class="img-fluid">
                                    </div>
                                </td>
                                <td>
                                    Plastic face shield
                                </td>
                                <td>$165</td>
                                <td>
                                    3
                                </td>
                                <td>1 June, 2020</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="cv-cart-img">
                                        <img src="https://via.placeholder.com/60x60" alt="image" class="img-fluid">
                                    </div>
                                </td>
                                <td>
                                    Hand gloves
                                </td>
                                <td>$65</td>
                                <td>
                                    5
                                </td>
                                <td>31 May, 2020</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="cv-cart-img">
                                        <img src="https://via.placeholder.com/60x60" alt="image" class="img-fluid">
                                    </div>
                                </td>
                                <td>
                                    Oxygen mask
                                </td>
                                <td>$65</td>
                                <td>
                                    2
                                </td>
                                <td>30 May, 2020</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account end -->
@endsection
