#include <a_samp>
#include <sacnr>
#include <a_json>

main(){    
    new 
        hostname[MAX_SACNR_HOST_SIZE],
        str[MAX_SACNR_INFO_SIZE],
        server_id = 1805074;
    
    format(hostname, sizeof hostname, "isparkhellzone.000webhostapp.com");
    SACNR_Connect(hostname);
    SACNR_getInfoById(server_id, str, sizeof str);
    printf("Info for Server ID: %d\n%s", server_id, str);
}
