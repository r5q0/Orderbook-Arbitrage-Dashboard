# Multi-Exchange Cryptocurrency Ticker Readme

This code provides a multi-exchange cryptocurrency ticker that retrieves and displays bid and ask prices for various cryptocurrency pairs against the USDT (Tether) stablecoin. The ticker gathers data from multiple cryptocurrency exchanges and presents the information in a unified format.

## Supported Exchanges

The code currently supports the following cryptocurrency exchanges:

1. Digifinex
2. XT
3. Bitmart
4. MEXC (MEXC Global)
5. Tradeogre

## Files and their Purpose

1. `index.php`: This file is the main entry point of the application. It imports data from all supported exchanges and displays the bid and ask prices for each cryptocurrency pair.

2. `digifinex.php`: This file retrieves cryptocurrency market data from the Digifinex exchange and stores bid and ask prices for relevant USDT pairs.

3. `xt.php`: This file retrieves cryptocurrency market data from the XT exchange and stores bid and ask prices for relevant USDT pairs.

4. `bitmart.php`: This file retrieves cryptocurrency market data from the Bitmart exchange and stores bid and ask prices for relevant USDT pairs.

5. `mexc.php`: This file retrieves cryptocurrency market data from the MEXC exchange and stores bid and ask prices for relevant USDT pairs.

6. `tradeogre.php`: This file retrieves cryptocurrency market data from the Tradeogre exchange and stores bid and ask prices for relevant USDT pairs.

## How to Use

1. Clone or download this repository to your local environment.

2. Ensure that you have PHP installed on your system.

3. Make sure you have an active internet connection to access the exchanges' APIs.

4. Run the `index.php` file in your PHP environment.

5. The script will fetch data from all supported exchanges and display the bid and ask prices for each cryptocurrency pair against USDT.

## Notes

1. Ensure that the PHP `file_get_contents` function is enabled on your server or hosting environment to allow API calls.

2. The code is designed to work with the specific exchange APIs mentioned in the files. If you wish to add more exchanges or make changes to existing ones, you will need to modify the respective files accordingly.

3. Please note that cryptocurrency markets are highly volatile, and prices can change rapidly. The displayed prices are real-time as fetched from the exchanges' APIs.

4. This code is for educational and informational purposes only. Use it responsibly and at your own risk.

5. Always exercise caution and perform due diligence when trading or investing in cryptocurrencies.

## Disclaimer

The code and information provided in this repository are for informational purposes only and should not be considered as financial or investment advice. The authors are not responsible for any trading or investment decisions made based on this code. Always conduct thorough research and seek advice from a qualified financial advisor before making any financial decisions.
