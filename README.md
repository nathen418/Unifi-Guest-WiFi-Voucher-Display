### ❗❗This repository is still in development and not ready for production❗❗

# Unifi Guest Wifi Voucher Display
This is a simple webserver that displays three current guest wifi voucher codes for a given Unifi Guest Wifi. It is intended to be used on a Raspberry Pi with a 6" screen of your choice.

## Installation

#### This project was designed to go on a Raspberry Pi however you can realistically put it on any webserver that can run PHP.

1. Install the latest version of [Raspbian](https://www.raspberrypi.org/downloads/raspbian/) on your Raspberry Pi.
2. Install at least verison PHP >=5.5.0 on your Raspberry Pi.
3. Create a new user on your Unifi Controller with read-only access to the Guest Wifi if you only want it to display the vouchers. If you want to be able to create new vouchers, you need to give the user the Hotspot Operator role.
4. Clone this repository to your Raspberry Pi.
5. Run `composer require art-of-wifi/unifi-api-client` to install the Unifi API Client dependancies.
6. Copy .env.example to .env and fill in the required information.
7. Create a WiFi qr code for your guest wifi and save it as `qr.png` in the root of this repository. You can use a website like [https://qifi.org](https://qifi.org/) to generate the qr code.


# Credits
This project is based on the [Unifi API Client](https://github.com/Art-of-WiFi/UniFi-API-client) by [Art of WiFi](https://github.com/Art-of-WiFi).  
It is also based on [Internal Error Page](https://github.com/nathen418/internal-error-page).


# License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.  
The UniFi API Client is licensed under the MIT License - see the [UAPI.LICENSE.md](UAPI.LICENSE.md) file for details.