<?php
	echo "begin script";
    $fout = fopen("classes.xml", "a");
    echo "created file";
    fwrite($fout, "<?xml version=\"1.0\"?>
    <!DOCTYPE prof-course SYSTEM \"prof-course.dtd\">
    <prof-course>
        <professor>
            <class>
                CSC 372
            </class>
            <class>
                CSC 470
            </class>
            <name>
                Antonette Logar
            </name>
        </professor>
        <professor>
            <class>
                CSC 470
            </class>
            <class>
                CSC 300
            </class>
            <name>
                Paul Hinker
            </name>
        </professor>
        <professor>
            <class>
                CSC 468
            </class>
            <class>
                CSC 447
            </class>
            <class>
                CSC 461
            </class>
            <name>
                John Weiss
            </name>
        </professor>
    </prof-course>
");
fclose($fout);
mkdir("submit");
chdir("submit");
mkdir("ALogar");
chdir("ALogar");
mkdir("CSC 372");
mkdir("CSC 470");
chdir("..");
mkdir("PHinker");
chdir("PHinker");
mkdir("CSC 470");
mkdir("CSC 300");
chdir("..");
mkdir("JWeiss");
chdir("JWeiss");
mkdir("CSC 468");
mkdir("CSC 447");
mkdir("CSC 461");
echo "COMPLETE";
?>
