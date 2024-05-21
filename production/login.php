<!DOCTYPE html>
<html lang="ar">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../build/images/favicon.ico" />

    <title>Al-Assala</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <header class="site-title color">
            <div class="wrap">
                <div class="containerup">
                    <h1>تسجيل الدخول</h1>
                </div>
            </div>
        </header>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content modalup content one-half">
                    <form method="post" action="server/auth.php">
                        <div class="f-row">
                            <div class="full-width">
                                <label for="username">اسم المستخدم</label>
                                <input id="username" type="text" class="form-control" name="username" autocomplete="false" required="" />
                            </div>
                        </div>
                        <div class="f-row">
                            <div class="full-width">
                                <label for="password">كلمة المرور</label>
                                <input id="password" type="password" class="form-control" name="password" autocomplete="false" required="" />
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-info btn-lg one-fourty" type="button" data-toggle="modal" data-target="#timeclock" value="تسجيل الدخول" />
                            <input class="btn btn-success btn-lg one-fourty" type="submit" value="الولوج للتطبيق" />
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="black" role="contentinfo">
        <div class="wrap">
            <div class="row">

                <!-- Column -->
                <article class="one-fourth">
                    <h2>للتواصل</h2>
                    <p> :تواصل معنا عبر الهاتف أو البريد الإلكتروني</p>
                    <p class="contact-data">+213 669 004 744 <span class="ico phone"></span> </p>
                    <p class="contact-data"> <a href="mailto:elassalacenter@gmail.com">elassalacenter@gmail.com</a> <span class="ico email"></span></p>
                </article>
                <!-- //Column -->

                <!-- Column -->
                <article class="one-half">
                    <h2>من نحن ؟</h2>
                    <br />
                    <p>تسعى مؤسسة الأصالة لترقية المجهود العلمي والفكري الأصيل، الهادف والجاد من خلال بلورة مشروع حضاري متكامل يسهم في النقلة النوعية للمجتمع وذلك بتوفير المناخ المناسب وتسيير سبل البحث والإنتاج الفكري لعموم المثقفين</p>
                </article>
                <!-- //Column -->

            </div>

            <div class="copy">
                <p>مؤسسة الأصالة للنشر والتدريب والدراسات</p>
            </div>
        </div>
    </div>
    <!-- //Footer -->
    
    <!-- - Timeclock - -->
    <div class="modal fade" id="timeclock" tabindex="-1" role="dialog" aria-labelledby="timeclockLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="deletebookLabel">تسجيل الدخول</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  
                        <form method="post" action="server/auth.php">
                            <input id="timeclockinput" type="hidden" name="timeclockinput" value=""/>
                            <input id="hiddenUsername" type="hidden" name="username" value=""/>
                            <input id="hiddenPassword" type="hidden" name="password" value=""/>
                            <div>
                                <input id="logoutButton" class="btn btn-danger btn-lg one-fourty" type="submit" value="خروج" />
                                <input id="loginButton" class="btn btn-success btn-lg one-fourty" type="submit" value="دخول" />
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#timeclock').on('show.bs.modal', function (event) {
                var username = $('#username').val();
                var password = $('#password').val();
                $('#hiddenUsername').val(username);
                $('#hiddenPassword').val(password);
            });
            $('#loginButton').on('click', function() {
                $('#timeclockinput').val('login');
            });

            $('#logoutButton').on('click', function() {
                $('#timeclockinput').val('logout');
            });
        });
    </script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <?php if (isset($_GET['error'])) { ?>
    <script>
        new PNotify({
            title: 'تنويه',
            text: 'يرجى التحقق من اسم المستخدم أو كلمة المرور',
            type: 'error',
            styling: 'bootstrap3'
        });
    </script>
    <?php }; 
    if (isset($_GET['info'])) { ?>
    <script>
        new PNotify({
            title: 'تنويه',
            text: 'تم تسجيل الخروج بنجاح',
            type: 'info',
            styling: 'bootstrap3'
        });
    </script>
    <?php }; 
    if (isset($_GET['successlogin'])) { ?>
    <script>
        new PNotify({
            title: 'تنويه',
            text: 'تم تسجيل وقت الدخول بنجاح',
            type: 'success',
            styling: 'bootstrap3'
        });
    </script>
    <?php }; 
    if (isset($_GET['errorlogin'])) { ?>
        <script>
            new PNotify({
                title: 'تنويه',
                text: 'تم تسجيل وقت الدخول لهذا اليوم مسبقا',
                type: 'info',
                styling: 'bootstrap3'
            });
        </script>
    <?php }; 
    if (isset($_GET['successlogout'])) { ?>
        <script>
            new PNotify({
                title: 'تنويه',
                text: 'تم تسجيل وقت الخروج بنجاح',
                type: 'success',
                styling: 'bootstrap3'
            });
        </script>
    <?php }; ?>
     <!-- Bootstrap -->
     <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>