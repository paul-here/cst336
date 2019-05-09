#!/usr/bin/awk -f

# this code prints all distinct json keys

BEGIN {
    temp = "";
}

{
    last_line = temp;
    temp = $0;

    if(temp == last_line){

        array[temp] = array[temp] + 1;
    } else {
        print temp;
        array[temp] = 1;
    }
}
END {
    for (key in array) {
        print key ": " array[key]
    }
}
