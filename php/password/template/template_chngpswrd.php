<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="../../../assets/img/icons/icon_wf.ico">
  <title>Recuperar Contraseña | CEM</title>

  <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Droid+Sans);

    img {
      max-width: 600px;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    a {
      text-decoration: none;
      border: 0;
      outline: none;
      color: #bbbbbb;
    }

    a img {
      border: none;
    }

    /* General styling */
    td,
    h1,
    h2,
    h3 {
      font-family: Helvetica, Arial, sans-serif;
      font-weight: 400;
    }

    td {
      text-align: center;
    }

    body {
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: none;
      width: 100%;
      height: 100%;
      color: #37302d;
      background: #ffffff;
      font-size: 16px;
    }

    table {
      border-collapse: collapse !important;
    }

    .headline {
      color: #ffffff;
      font-size: 36px;
    }

    .force-full-width {
      width: 100% !important;
    }

    .step-width {
      width: 110px;
      height: 111px;
    }
  </style>

  <style type="text/css" media="screen">
    @media screen {
      td,
      h1,
      h2,
      h3 {
        font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
      }
    }
  </style>

  <style type="text/css" media="only screen and (max-width: 480px)">
    @media only screen and (max-width: 480px) {
      table[class="w320"] {
        width: 320px !important;
      }
      img[class="step-width"] {
        width: 80px !important;
        height: 81px !important;
      }
    }
  </style>
</head>

<body class="body" style="padding:0; margin:0; display:block; background:#fff; -webkit-text-size-adjust:none" bgcolor="#fff">
  <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
      <td align="center" valign="top" bgcolor="#fff" width="100%">
        <center>
          <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="600" class="w320">
            <tr>
              <td align="center" valign="top">

                <table style="margin: 0 auto; background:#414141;" cellpadding="0" cellspacing="0" width="100%" style="margin:0 auto;">
                  <tr>
                    <td style="font-size: 30px; text-align:center;">
                      <br>
                      <a href='https://cem.worldferias.com/' target='_blank'>
                        <img alt="CUSTOMER EVENT MANAGEMENT" title="CUSTOMER EVENT MANAGEMENT" height='55' width='100' src='https://cem.worldferias.com/assets/img/logos/email/logo-cem.png' />
                      </a>
                      <br>
                      <br>
                    </td>
                  </tr>
                </table>

                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="100%" bgcolor="#4dbfbf">
                  <tr>
                    <td class="headline">
                      <br>
                      <i>Restablecer Contraseña</i>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <br>
                      <center>
                        <table style="margin:0 auto;" cellspacing="0" cellpadding="0" class="force-width-80">
                          <tr>

                            <td>
                              <!-- ======== STEP ONE ========= -->
                              <img class="step-width" src="https://cem.worldferias.com/assets/img/logos/email/step_one.png" alt="Paso Uno - Solicitud" title="Paso Uno - Solicitud">
                            </td>
                            <!-- ======== STEP TWO ========= -->
                            <td>
                              <img class="step-width" src="https://cem.worldferias.com/assets/img/logos/email/step_two.png" alt="Paso Dos - Código" title="Paso dos - Codigo">
                            </td>
                            <!-- ======== STEP THREE ========= -->
                            <td>
                              <img class="step-width" src="https://cem.worldferias.com/assets/img/logos/email/step_three.png" alt="Paso Tres - ¡Hecho!" title="Paso Tres - ¡Hecho!">
                            </td>
                          </tr>

                          <tr>
                            <td style="vertical-align:top; color:#fff;">
                              Solicitud
                            </td>
                            <td style="vertical-align:top; color:#fff; font-weight:bold;">
                              Código
                            </td>
                            <td style="vertical-align:top; color:#fff;">
                              ¡Hecho!
                            </td>
                          </tr>
                        </table>
                      </center>
                    </td>
                  </tr>
                  <tr>
                    <td>

                      <center>
                        <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" width="60%">
                          <tr>
                            <td style="color:#fff;">
                              <br>
                              <br>
                              Tu Código para restablecer tu <b>Contraseña<b>
                            </td>
                          </tr>
                          <tr>
                            <td style='font-size:0px;padding:10px 25px;word-break:break-word;'>
                              <div style='font-family:Oxygen, Helvetica neue, sans-serif;font-size:14px;line-height:21px;text-align:center;'>
                                <p style='padding: 10px 0; border: 1px solid #fff; color: #fff; font-weight: bold; font-size: 18px; text-align: center;'>
                                  <?php echo $codigo_recovery; ?>
                                </p>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </center>

                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div>
                        <!--[if mso]>
                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="8%" stroke="f" fillcolor="#178f8f">
                          <w:anchorlock/>
                          <center>
                        <![endif]-->
                        <a href='https://cem.worldferias.com/php/reset_password.php?dat1=<?php echo $email_encrypt; ?>&dat2=<?php echo $token_encrypt; ?>' style="background-color:#178f8f;border-radius:4px;color:#ffffff;display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:16px;line-height:50px;text-align:center;text-decoration:none;width:250px;-webkit-text-size-adjust:none;"><b>REESTABLECER</b></a>
                        <!--[if mso]>
                          </center>
                        </v:roundrect>
                      <![endif]-->
                      </div>
                      <br>
                      <br>
                    </td>
                  </tr>
                  <tr>
                    <td style="color:#fff;">
                      <small><i>Tiene 15 minutos para hacer valido su Código, de lo contrario caducará.<br>
                        Si usted no solicito este cambio favor de omitir este mensaje.</i></small>
                      <br>
                      <br>
                    </td>
                  </tr>
                </table>

                <table style="margin: 0 auto;" cellpadding="0" cellspacing="0" class="force-full-width" bgcolor="#414141" style="margin: 0 auto">
                  <tr>
                    <td style="background-color:#414141;">
                      <br>
                      <a href='https://worldferias.com/' target='_blank'>
                        <img alt="TECHNOLOGY FOR YOUR EVENT" title="TECHNOLOGY FOR YOUR EVENT" height='70' width='140' src='https://cem.worldferias.com/assets/img/logos/email/logo.png' />
                      </a>
                    </td>
                  </tr>
                  <tr>

                    <td style="color:#bbbbbb; font-size:12px;">
                      <br>
                      © 2021 All Rights Reserved
                      <br>
                      <br>
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
          </table>
        </center>
      </td>
    </tr>
  </table>
</body>

</html>