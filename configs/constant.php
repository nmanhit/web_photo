<?php
declare(strict_types=1);

const BASE_URL = "http://localhost/demo/";
const DB_HOST = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_DATABASE = "db_photo";

const BASE_DIR = __DIR__ . "/..";
const ACTIVE = 1;
const INACTIVE = 0;
const LOGIN_ID = 1;
const REPLACE_FLAGS = ENT_COMPAT;
const CHARSET = "ISO-8859-1";
const CONTROLLER_SUFFIX = "Controller";
const ACTION_PREFIX = "action";
const DATE_TIME_FORMAT = "Y-m-d H:i:s";

const DIR_UPLOAD_FILE = BASE_DIR.'/static/upload/';
const MAX_FILE_SIZE_UPLOAD_IN_MB = 50 * 1024 * 1024; // 50MB
const FILE_EXTENSION_ALLOWED = array('jpg','jpeg','png','gif');