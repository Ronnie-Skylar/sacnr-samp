/*

Overview:-
~~~~~~~~~~

	This library contains functions which returns information about a server by communicating with
the SACNR API.


Insight:-
~~~~~~~~~

	Since the callbacks are handled as tasks using PawnPlus there is no need to write any additional 
callback for when the data is fetched. The functions directly returns the result as a string but in
JSON format. Later the result can be used with any JSON stringify-parser to collect the required data.


Defines:-
~~~~~~~~~

MAX_SACNR_HOST_SIZE - 	This define can be used to create a string var which can later be passed 
					  	in SACNR_Connect()

					  	*Note: 	To know more about this define please refer to either the test.pwn
								or the documentation.


MAX_SACNR_INFO_SIZE - 	This define can be used to create a string var which should be able to ac-
						commodate the @return for SACNR_getInfoById()

						*Note: 	To know more about this define please refer to either the test.pwn
								or the documentation.


Functions:-
~~~~~~~~~~~

SACNR_Connect() - 			@args - hostname[]  contains the hostname string. If a variable is 
												passed then it is recommended that the size of 
												the variable be MAX_SACNR_HOST_SIZE.

							Overview
							~~~~~~~~
							This function needs to be passed with the hostname (i.e. localhost) 
							where the  php files reside. 

							*Note: If this is not called even once then any function that you use
								   will give you a negative fetched result.							

							@return - N/A							

SACNR_getInfoById() -		@args - server_id 	The ID of the server needs to be passed. To get
												the ID of a server you can either use SACNR's 
												server list (monitor.sacnr.com) or use the fun-
												ction SACNR_getInfoByIP()

												*Note SACNR_getInoByIP() will be released in t-
												he near future.

									data[]		The C-style string needs to be passed where t-
												he result JSON info will be stored.

									size 		The size of data[]

							Overview
							~~~~~~~~
							This function takes in the server id of the server you want the info
							of. And stores it in the string variable in a JSON format.

							@return - (0) 	if the function fails which is only because of hostname
											not being present

									  (1)	If the function successfully returns the JSON data for
									  		the server


Credits:-
~~~~~~~~~
$kylar(Me) - 	For making this library

GiamPy - 		Without this guy I wouldn't have been able to understand how to use an API.
				Thanks for the wonderful library. With his help now I contribute to his r-
				epository as well.
				(https://github.com/GiampaoloFalqui/TFA_SAMP) 
				(https://github.com/Ronnie-Skylar/TFA_SAMP)

IllidanS4 -		For PawnPlus. It's an amazing plugin. Do check it out.
				(https://github.com/IllidanS4/PawnPlus)
*/

#include <a_samp>
#include <a_http>
#include <pawnplus>

#define MAX_SACNR_HOST_SIZE 60		
#define MAX_SACNR_INFO_SIZE 512		


static SACNR_Hostname[MAX_SACNR_HOST_SIZE];
static bool:SACNR_IsConnSetup = false;


stock SACNR_Connect(hostname[MAX_SACNR_HOST_SIZE]){
	strmid(SACNR_Hostname, hostname, 0, sizeof hostname);
	SACNR_IsConnSetup = true;
}


stock Task:SACNR_ExecuteHTTP(server_id){
	#define MAX_SACNR_URL_SIZE 256

	new Task:t = task_new();

	new _url_[MAX_SACNR_URL_SIZE];
	format(_url_, sizeof _url_, "%s/sacnr/execute.php?command=getInfoByID&id=%d", SACNR_Hostname, server_id);
	HTTP(0, HTTP_GET, _url_, "", #SACNR_OnResponse);
	pawn_register_callback(#SACNR_OnResponse, #SACNR_OnHTTPResponse, _, "ed", t);

	#undef MAX_SACNR_URL_SIZE

	return t;
}
stock SACNR_getInfoById(server_id, data[], size){

	if(!SACNR_IsConnSetup){
		format(data, size, "{\"success\":\"false\", \"message\":\"Connection not set up.\"}");
		return 0;
	}
	else{
		format(data, size, "%s", task_await(SACNR_ExecuteHTTP(server_id)));
		return 1;
	}	
}

forward SACNR_OnResponse(index, response, data[]);
public SACNR_OnResponse(index, response, data[]) {}

forward SACNR_OnHTTPResponse(CallbackHandler:id, Task:task, index, response, data[]);
public SACNR_OnHTTPResponse(CallbackHandler:id, Task:task, index, response, data[]){	
	task_set_result_str(task, data);
	pawn_unregister_callback(id);
}