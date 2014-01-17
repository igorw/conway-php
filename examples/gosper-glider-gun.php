<?php

$world = <<<EOF

                         x
                       x x
             xx      xx            xx
            x   x    xx            xx
 xx        x     x   xx
 xx        x   x xx    x x
           x     x       x
            x   x
             xx

EOF;

return igorw\conway\parse($world);
