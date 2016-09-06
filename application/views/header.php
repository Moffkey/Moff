<?php
$this->load->helper('url');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="//cdn.honokak.osaka/honoka/3.3.7/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <style>
            .icon{
                height:1em;
            }
            .icon-kimoti-ookime{
                height:1.2em;
            }
            .icon-big{
                width:3em;
                height:3em;
            }
            .icon-test{
                width:5em;
                height:5em;
            }
            .comment{
                position:relative;
            }
            .comment > .icon-big{
                float:left;
            }
            .comment-time{
                position:absolute;
                right:0;
                top:-1.4em;
                color:#888;
            }
            .comment-user{
                position:absolute;
                left:5.1em;
                top:-1.4em;
                color:#888;
            }
            .comment-body{
                margin-left:4em;
                border:1px solid #888;
                border-radius:0.5em;
                padding:0.5em;
                min-height:3em;
                margin-top:1.5em;
            }
            .event-mark{
                font-size:2em;
            }
            .akari{
                opacity:0;
            }
            .event-owner-wrapper{
                position:absolute;
                right:0;
                bottom:0;
            }
            h2 > span{
                border-bottom: 2px solid black;
                padding-right:1em;
            }
            h1 {
                border-bottom: 2px solid black;
                position:relative;
            }
            .vote-comment{
                font-size:0.5em;
            }
            td,th{
                vertical-align: middle !important;
            }
            td{
                text-align:center;
            }
            textarea{
                resize:vertical;
            }
            .icon-menu{
                position:absolute;
                left:-0.5em;
                top:-0.5em;
                width:2.5em;
                height:2.5em;
            }
            .icon-menu-wrap{
                position:relative;
                display:inline-block;
                width:2.5em;
            }
        </style>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="//cdn.honokak.osaka/honoka/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-menu-more" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url(''); ?>">moff</a>
                <div class="collapse navbar-collapse" id="top-menu-more">
                    <ul class="nav navbar-nav">
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if($isLogin){ ?>
                                <li><a href="<?= site_url('user') ?>">
                                    <?php echo icon_by_screen_name($this->session->userdata('screen_name')); ?>ユーザーページ</a>
                        <?php } else { ?>
                                <li><a href="<?= site_url('login') ?>">ログイン</a>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
