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
                                <input type="text" class="form-control" name="username" autocomplete="false" required="" />
                            </div>
                        </div>
                        <div class="f-row">
                            <div class="full-width">
                                <label for="password">كلمة المرور</label>
                                <input type="password" class="form-control" name="password" autocomplete="false" required="" />
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-success btn-lg full-width" type="submit" value="تسجيل الدخول" />
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
    
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
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
    <?php }; ?>
</body>

</html>