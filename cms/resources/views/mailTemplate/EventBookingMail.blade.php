<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Policy Detals</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <div class="policy-detail" style="display: block;margin: 30px auto;border: 2px solid #000; max-width: 1100px;">
    <table style="max-width:1100px; color: #000;font-family: arial;font-size: 10px; vertical-align:top;">
      <tbody>
          <tr>
              <td  align="center" style="padding: 10px; font-size: 16px;"><b>Donation Invoice</b></td>
          </tr>
          <tr>
              <td>
                  <table style="border:0px;width:100%">
                        <tr >
                            <td colspan="2" style="padding:10px;text-align:right" > <b> Date : </b>{{ $data['datetime']}} </td>
                        </tr>
                        <tr>
                             <td colspan="2"  style="padding:10px;"> <h2>Hello, {{ucfirst($data['name'])}}</h2></td>
                        </tr>
                        <tr>
                            <td style="padding:10px;" width="100"><b>Invoice Number</b></td>
                            <td style="padding:10px;"> <b> {{ $data['invoice']}} </b></td>
                        </tr>
                        <tr>
                            <td style="padding:10px;" width="100"><b>Project Name</b></td>
                            <td style="padding:10px;"> {{ $data['project_name']}}</td>
                        </tr>
                        <tr>
                            <td style="padding:10px;" width="100"><b>Campaign</b></td>
                            <td style="padding:10px;"> {{ $data['campaign_name']}} </td>
                        </tr>
                        <tr>
                            <td style="padding:10px;" width="100"><b>Donation Amount</b></td>
                            <td style="padding:10px;"><span>₹</span><span>{{ $data['amount']}}</span></td>
                        </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td   align="center"><hr style="margin: 0 -5px;border-bottom: 1px solid #000;"></td>
          </tr>
          <tr>
               <td   style="padding: 10px; line-height: 20px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
          </tr>
          <tr>
              <td   align="center" style="padding: 10px;">Bangalore, Karnataka</td>
          </tr>
          <tr>
              <td   align="right" style="padding: 10px;">For InnerEye Foundation LTD</td>
          </tr>
      </tbody>
    </table>
   </div>
  </body>
</html>
