<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pemasukan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style>
    #invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;


::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}

#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 100px;}
#mid{min-height: 80px;}
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;}
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  //padding: 5px;
  font-size: .5em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

#legalcopy{
  margin-top: 5mm;
}



}
    </style>
  <div id="invoice-POS">

        <center id="top">
          <div class="logo"></div>
          <div class="info">
            <h2>Bearesto</h2>
          <h5>Table - Lavender</h5>
            <h5>Order Id 1</h5>
            <p>Status : Di Order (Belum Dibayar)</p>
          </div>
        </center>

        <div id="mid">
          <div class="info">
            <h2>Contact Info</h2>
            <p>
                Address : Jl raya puncak km 77 cisarua bogor</br>
                Email   : bearesto@gmail.com</br>
                Phone   : 081919002001</br>
                Oder Date : {{Carbon::now()->formay('Y-M-d')}}
            </p>
          </div>
        </div><!--End Invoice Mid-->

        <div id="bot">

                        <div id="table">
                            <table>
                                <tr class="tabletitle">
                                    <td class="item"><h2>Menu</h2></td>
                                    <td class="Hours"><h2>Qty</h2></td>
                                    <td class="Rate"><h2>Sub Total</h2></td>
                                </tr>

                                <tr class="service">
                                    <td class="tableitem"><b class="itemtext">{{$menu->where('id',$items->id_menu)}}</b><p style="font-size: smaller">*Tidak Pake Lalab</p></td>
                                <td class="tableitem"><p class="itemtext">{{$jumlah}}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{375.000}}</p></td>
                                </tr>

                                <tr class="tabletitle">
                                    <td></td>
                                    <td class="Rate"><h2>Total</h2></td>
                                    <td class="payment"><h2>$3,644.25</h2></td>
                                </tr>

                            </table>
                        </div><!--End Table-->

                        <div id="legalcopy">
                            <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.
                            </p>
                        </div>

                    </div><!--End InvoiceBot-->
      </div><!--End Invoice-->
</body>
</html>
