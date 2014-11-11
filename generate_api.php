#!/bin/php
<?php
//clean
shell_exec('rm -fr document/*');
//and rebuild
system('php vendor/bin/apigen --source source/Net/Bazzline/Component/ProcessPipe/ --destination document/ --title "Process Pipe by Bazzline"');
