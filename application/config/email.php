<?php
switch (ENVIRONMENT) {
    case 'development':
        $config['useragent']= 'PHPMailer'; // Mail engine switcher: 'CodeIgniter' or 'PHPMailer'
        $config['protocol'] = 'smtp'; // 'mail', 'sendmail', or 'smtp'
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 's21violeta@gmail.com';
        $config['smtp_pass'] = '*******';
        $config['smtp_port'] = 587;
        $config['smtp_timeout'] = 30; // (in seconds)
        $config['smtp_crypto'] = 'tls'; // '' or 'tls' or 'ssl'
        /* PHPMailer's SMTP debug info level: 0 = off, 1 = commands, 2 = commands and data, 3 =
        as 2 plus connection status, 4 = low level data output.*/
        $config['smtp_debug'] = 2;
        /* PHPMailer's SMTP debug output: 'html', 'echo', 'error_log' or user defined function
        with parameter $str and $level. NULL or '' means 'echo' on CLI, 'html' otherwise.*/
        $config['debug_output'] = '';
        /* Whether to enable TLS encryption automatically if a server supports it, even if
        `smtp_crypto` is not set to 'tls'. */
        $config['smtp_auto_tls'] = true;
        /* SMTP connection options, an array passed to the function stream_context_create() when
        connecting via SMTP. */
        $config['smtp_conn_options'] = array('ssl' => ['verify_peer' => false]);
        $config['wordwrap'] = true;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html'; // 'text' or 'html'
        /* 'UTF-8', 'ISO-8859-15', ...; NULL (preferable) means config_item('charset'), i.e.
         the character set of the site. */
        $config['charset'] = 'UTF-8';
        $config['validate'] = true;
        /* 1, 2, 3, 4, 5; on PHPMailer useragent NULL is a possible option, it means that
         X-priority header is not set at all, see https://github.com/PHPMailer/PHPMailer/issues/449 */
        $config['priority'] = 3;
        $config['crlf'] = "\n"; // "\r\n" or "\n" or "\r"
        $config['newline'] = "\n"; // "\r\n" or "\n" or "\r"
        $config['bcc_batch_mode'] = false;
        $config['bcc_batch_size'] = 200;
        $config['encoding'] = '8bit';
        /* The body encoding. For CodeIgniter: '8bit' or '7bit'. For PHPMailer: '8bit',
        '7bit', 'binary', 'base64', or 'quoted-printable'. */
        break;
    case 'production':
        $config['charset'] = 'UTF-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not
        break;
    default:
        exit('The application environment is not set correctly.');
}
?>