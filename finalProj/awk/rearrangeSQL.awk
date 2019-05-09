#!/usr/bin/awk -f

# this code reorders values and prints them in sql insert format

BEGIN {
    FS = "\"";
    OFS = "\"";
}
{
    #    temp2 = $2;
    #    temp4 = $4;
    #    temp6 = $6;
    #    temp8 = $8;
    #
    #    $2 = $16;
    #    $4 = $12;
    #    $6 = $10;
    #    $8 = $14;
    #    $10 = temp2;
    #    $12 = temp4;
    #    $14 = temp8;
    #    $16 = temp6;

print "(\"" $14 "\",\"" $12 "\",\"" $10 "\"" $13 "\"" $2 "\",\"" $4 "\",\"" $8 "\",\"" $6 "\"),";

}