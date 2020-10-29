@extends('layouts.app')

@section('content')

 <div class="main-div" style="background-image: url('/images/background.jpg'); background-repeat: no-repeat;">
    <div class="container-fluid" >
        <div class="row justify-content-center">
            <div class="col-md-6">

                <h3 class="alert-heading" >Follow these 2 simple steps to redeem: </h3>
                <hr>
                <table>
                <tr>
                  <td>
                      <h4 class="steps-heading" >1.  Fill up your purchase details along with a copy of the invoice and contact information.</h4>
                  </td>

                </tr>
                      <td>
                          <h4 class="steps-heading">2.  Get ready to be blown away by the online shopping vouchers that you will receive against your purchase of an AVITA laptop! </h4>

                      </td>
                  </tr>
            <tr>
            <td>
                <h4 class="bold-heading" ><strong> Don't forget to follow and subscribe us on our social  media handles listed below.</strong></h4>
             </td>
        </tr>
       

                </table>
        <div class="social-icons">
                <a href="https://www.facebook.com/AvitaIndia/" class="fa fa-facebook" aria-hidden="true"></a>
                <a href="https://twitter.com/AvitaIndia" class="fa fa-twitter" aria-hidden="true"></a>
                <a href="https://www.instagram.com/avitaind/" class="fa fa-instagram" aria-hidden="true"></a>
                <br/>
        </div>
                <img src="/images/laptops.png" class="logo"> 

            </div>

            <div class="col-md-6" style="margin-top: 10%;">
                <div class="card" style="position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: rgb(255, 255, 255, 0.1);
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 25px">
                        <div class="card-body">
                       <!--- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        --->
                    
                        <div class="container">
                            <div class="row">
                               <div class="col-12">
                  
                            @if(Session::has('message'))
                            <script>
                                swal('Thank you for your submission! Your entry has been successfully recorded. You shall receive your voucher on your E-Mail ID within 24-48 hours. We hope that you’re as excited as we are. 😃' )
                            </script>
                            @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                   
                                     <form action="{{ route('giftsonair.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                            <div class="col-md-6">
                                                <input id="email" type="text" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">Contact No.</label>
                                            <div class="col-md-6">
                                                <input id="phone" type="text" class="form-control" name="phone" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="purchased_from" class="col-md-4 col-form-label text-md-right">City </label>
                                            <div class="col-md-6">
                                                <input id="purchased_from" type="text" class="form-control" name="purchased_from" required>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                             <label for="date_of_purchase" class="col-md-4 col-form-label text-md-right">Date of Purchase</label>
                                             <div class="col-md-6">
                                                 <input id="date_of_purchase" type="date" class="form-control" name="date_of_purchase" required>
                                             </div>
                                         </div>
                                        <div class="form-group row">
                                            <label for="serial_no" class="col-md-4 col-form-label text-md-right">Serial No.</label>
                                            <div class="col-md-6">
                                                <input id="serial_no" type="text" class="form-control" name="serial_no" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="model_no" class="col-md-4 col-form-label text-md-right">Model No.</label>
                                            <div class="col-md-6">
                                                <input id="model_no" type="text" class="form-control" name="model_no" required>
                                            </div>
                                        </div>
                                     
                                        <div class="form-group row">
                                            <label for="invoice_no" class="col-md-4 col-form-label text-md-right">Invoice No.</label>
                                            <div class="col-md-6">
                                                <input id="invoice_no" type="text" class="form-control" name="invoice_no" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="invoice_image" class="col-md-4 col-form-label text-md-right">Invoice Copy</label>
                                            <div class="col-md-6">
                                                <input id="invoice_image" type="file" class="form-control" name="invoice_image" required>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 text-md-right">
                                                <button type="submit" style="margin:10px;" class="btn btn-primary">Submit</button>
                                            </div>
                                            <div class="col-md-6 text-md-left">
                                                <button type="reset" style="margin:10px;" class="btn btn-primary ">Reset</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <h2 class="desclimer" style="color:#000;"><strong>Disclaimer</strong></h3>
<hr>
     <p class="product-statement-list" style="text-align:center; margin:2%; color:#000;">
         Winners are selected through an auto-generated process by our systems. No giveaways are affiliated in any way with the dealerships or associated with any organizations related to the products mentioned in the giveaway. Winners will be notified through email.
         The rules of the contest are at the behest of the organizer and not following them will result in immediate disqualification. Winners are entitled to their prizes and will receive the said items in 15 days, unless they are out of stock, in that case the prizes
         will be disbursed upon restocking. All products shown are for illustration purpose only. Actual product may vary. Offer valid from 28<sup>th</sup> Oct 2020 till 15<sup>th</sup> November 2020. Terms and Conditions apply.
     </p>
 </div>
@endsection
