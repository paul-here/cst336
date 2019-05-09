#!/usr/bin/awk -f

# this code replaces category key words with integers

BEGIN {
    FS = ",";
    OFS = ",";
}
{
    if($2 == "\"Biotechs\""){
        $2 = "1";
    }
    if($2 == "\"Broadcasting & Cable\""){
        $2 = "2";
    }
    if($2 == "\"Natural Gas Utilities\""){
        $2 = "3";
    }
    if($2 == "\"Railroads\""){
        $2 = "4";
    }
    if($2 == "\"Technology\""){
        $2 = "5";
    }

    print $0;
}
