@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group float-right">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Invoice PDF
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" target="_blank" href="{{route('invoice.pdf',['type'=>'stream'])}}">View</a>
                          <a class="dropdown-item" target="_blank" href="{{route('invoice.pdf',['type'=>'download'])}}">Download</a>
                        </div>
                      </div>
                </div>

                <div class="card-body" style="height: 100vh;">
                    <style>
                        .w-100{
                            width: 100%;
                        }
                        .text-center{
                            text-align: center;
                        }
                        .text-left{
                            text-align: left;
                        }
                        .text-right{
                            text-align: right;
                        }
                        footer.pdf-footer{
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            background: #1AA3D0;
                            font-size: 10px;
                            margin: 0;
                            padding: 10px 0;
                            height: 50px;
                            color: white;
                        }
                        .m-0{
                            margin: 0;
                        }
                        .my-10{
                            margin-top: 10px;
                            margin-bottom: 10px;
                        }

                        .product_table{
                            border-collapse: collapse;

                        }
                        .product_table th, .product_table td{
                            padding: 5px;
                        }
                        .product_table th{
                            background: #1AA3D0;
                            color: white;
                        }
                        .product_table tr:nth-child(even){ background: #f2f2f2;}
                    </style>
                   <main>
                       <div>
                           <table class="w-100">
                               <tr>
                                   <td class="text-left">
                                       <img src="{{asset('logo-2x.png')}}" alt="Logo" style="width:200px;">
                                   </td>
                                   <td class="text-right">
                                       <h4 class="m-0">INVOICE</h4>
                                   </td>
                               </tr>
                           </table>
                       </div>
                       <div class="my-10">
                           <table class="w-100">
                               <tr>
                                   <td width="70%" class="text-left">
                                       <b>To</b><br>
                                       Mohammad Arman<br>
                                       arman@gmail.com<br>
                                       01521225987<br>
                                       Agrabad, Chittagong-4100
                                   </td>
                                   <td width="30%" class="text-right">
                                       <b>Invoice No:</b> 1001<br>
                                       <b>Payment Status:</b> Paid<br>
                                   </td>
                               </tr>
                           </table>
                       </div>
                       <div>
                           <table class="w-100 product_table">
                               <thead>
                                   <tr>
                                       <th class="text-center">#</th>
                                       <th class="text-left">Description</th>
                                       <th class="text-center">Qty</th>
                                       <th class="text-right">Price</th>
                                       <th class="text-right">Subtotal</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td class="text-center">1</td>
                                       <td class="text-left">Item One</td>
                                       <td class="text-center">5</td>
                                       <td class="text-right">100.00</td>
                                       <td class="text-right">500.00</td>
                                   </tr>
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <td colspan="4" class="text-right">Total</td>
                                       <td class="text-right">500.00</td>
                                   </tr>
                               </tfoot>
                           </table>
                       </div>
                   </main>
                   <footer class="pdf-footer w-100 text-center">
                       Corressponding Address<br>
                       Email: abc@mail.com | Contact No: +8801521225987 | Address: Agrabad, Chittagong-4100
                   </footer>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
