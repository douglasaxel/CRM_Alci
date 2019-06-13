<div class="wrapper-login fadeInDown">
    <div id="formContent">
        <div class="fadeIn first">
            <img src="<?= base_url(); ?>assets/img/logo.jpeg" id="icon" alt="User Icon" />
            <!-- <h2>Pastor Alci</h2> -->
        </div>

        <form action="<?= site_url('login/authenticate'); ?>" method="post" enctype="multipart/form-data">
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="senha">
            <input type="submit" class="fadeIn fourth" value="Entrar">
        </form>

        <div id="formFooter">
            <a class="underlineHover" href="#">Esqueceu a senha?</a>
        </div>

    </div>
</div>