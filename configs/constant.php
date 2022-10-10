<?php
declare(strict_types=1);

const BASE_URL = "http://localhost/web_photo/";
const BASE_DIR = __DIR__ . "/..";

const DB_HOST = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "05003539172";
const DB_DATABASE = "db_photo";

const ACTIVE = 1;
const INACTIVE = 0;
const LOGIN_ID = 1;
const REPLACE_FLAGS = ENT_COMPAT;
const CHARSET = "ISO-8859-1";
const DATE_TIME_FORMAT = "Y-m-d H:i:s";

const CONTROLLER_SUFFIX = "Controller";
const ACTION_PREFIX = "action";
const CONTROLLER_DEFAULT = "category";
const ACTION_DEFAULT = "index";


const DIR_UPLOAD_FILE = BASE_DIR.'/static/upload/';
const MAX_FILE_SIZE_UPLOAD_IN_MB = 50 * 1024 * 1024; // 50MB
const FILE_EXTENSION_ALLOWED = array('jpg','jpeg','png','gif');
const IMG_PREVIEW_DEFAULT = "https://s.imgur.com/desktop-assets/desktop-assets/browse.fcd082e3eb7f93767b2b9edb7b3f1c2a.svg";


const STATUS_301 = 301;
const STATUS_302 = 302;
