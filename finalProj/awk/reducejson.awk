#!/usr/bin/awk -f

# this code removes extraneous fields from json (json to json)

/^\[/{print $0}
/{/ {
    print $0;
}

/\"name/ {print $0;}
/\"imageUri/ {print $0;}
/\"industry/ {print $0;}
/\"country/ {print $0;}
/\"marketValue/ {print $0;}
/\"headquarters/ {print $0;}
/\"ceo/ {print $0;}
/\"description/ {print $0;}

/}/ {print $0;}
/\]/ {print $0;}
