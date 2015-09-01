<?php

function shouldSendRegisterEmail()
{
    return !( empty(env('MAIL_DRIVER')) || empty(env('MAIL_HOST')) || empty(env('MAIL_PORT')) || empty(env('MAIL_USERNAME'))
        || empty(env('MAIL_PASSWORD')) );
}
