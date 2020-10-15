<?php

namespace ccxt;

// PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
// https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

use Exception; // a common import
use \ccxt\ExchangeError;
use \ccxt\ArgumentsRequired;
use \ccxt\BadRequest;
use \ccxt\NotSupported;

class duedex extends Exchange {

    public function describe() {
        return $this->deep_extend(parent::describe (), array(
            'id' => 'duedex',
            'name' => 'DueDEX',
            'countries' => array( 'BZ' ), // Belize
            'version' => 'v1',
            'userAgent' => null,
            'rateLimit' => 200,
            'has' => array(
                'cancelOrder' => true,
                'CORS' => true,
                'cancelAllOrders' => true,
                'createOrder' => true,
                'editOrder' => true,
                'fetchBalance' => true,
                'fetchClosedOrders' => 'emulated',
                'fetchDeposits' => false,
                'fetchLedger' => false,
                'fetchMarkets' => true,
                'fetchMyTrades' => false,
                'fetchOHLCV' => true,
                'fetchOpenOrders' => true,
                'fetchOrder' => true,
                'fetchOrderBook' => false,
                'fetchOrders' => true,
                'fetchOrderTrades' => false,
                'fetchTicker' => true,
                'fetchTickers' => true,
                'fetchTime' => false,
                'fetchTrades' => false,
                'fetchTransactions' => false,
                'fetchWithdrawals' => false,
            ),
            'timeframes' => array(
                '1m' => '1',
                '30m' => '30',
                '1h' => '60',
                '1d' => 'D',
            ),
            'urls' => array(
                'test' => array(
                    'public' => 'https://api.testnet.duedex.com',
                    'private' => 'https://api.testnet.duedex.com',
                    'bars' => 'https://testnet.duedex.com/bars',
                ),
                'logo' => 'https://avatars3.githubusercontent.com/u/51757131?s=200&v=4',
                'api' => array(
                    'public' => 'https://api.duedex.com',
                    'private' => 'https://api.duedex.com',
                    'bars' => 'https://www.duedex.com/bars',
                ),
                'www' => 'https://www.duedex.com',
                'doc' => array(
                    'https://github.com/DueDEX/API-Documentation',
                ),
                'fees' => 'https://duedex.zendesk.com/hc/en-us/articles/360022357973-Perpetual-Swaps-Trading-Fees',
                'referral' => 'https://www.duedex.com/register?code=BEFTWN',
            ),
            'api' => array(
                'public' => array(
                    'get' => array(
                        'instrument',
                        'ticker',
                        'ticker/{instrument}',
                    ),
                ),
                'private' => array(
                    'get' => array(
                        'order/active',
                        'order',
                        'order/all',
                        'position',
                        'margin',
                    ),
                    'post' => array(
                        'order',
                        'position/leverage',
                        'position/riskLimit',
                        'position/margin/transfer',
                    ),
                    'delete' => array(
                        'order',
                    ),
                    'patch' => array(
                        'order',
                    ),
                ),
                'bars' => array(
                    'get' => array(
                        'tradingView/history',
                    ),
                ),
            ),
            'exceptions' => array(
                'exact' => array(
                    '-1' => '\\ccxt\\ExchangeError', // internal server error
                    '100' => '\\ccxt\\ExchangeError', // service unavailable
                    '1000' => '\\ccxt\\BadRequest', // invalid argument
                    '5000' => '\\ccxt\\BadRequest', // endpoint not found
                    '5001' => '\\ccxt\\BadRequest', // header missing
                    '5002' => '\\ccxt\\AuthenticationError', // api key not found
                    '5003' => '\\ccxt\\InvalidNonce', // invalid timestamp
                    '5004' => '\\ccxt\\BadRequest', // invalid expiration
                    '5005' => '\\ccxt\\AuthenticationError', // invalid signature
                    '5006' => '\\ccxt\\BadRequest', // duplicate parameter
                    '5007' => '\\ccxt\\BadRequest', // unsupported charset
                    '5008' => '\\ccxt\\BadRequest', // request too large
                    '5009' => '\\ccxt\\BadRequest', // unsupported mime type
                    '5010' => '\\ccxt\\RateLimitExceeded', // rate limit exceeded
                    '5011' => '\\ccxt\\PermissionDenied', // insufficient permission
                    '5012' => '\\ccxt\\PermissionDenied', // not in ip whitelist
                    '10035' => '\\ccxt\\BadRequest', // invalid leverage
                    '10036' => '\\ccxt\\BadRequest', // invalid instrument status
                    '10037' => '\\ccxt\\InvalidOrder', // invalid order status
                    '10038' => '\\ccxt\\BadRequest', // invalid price step
                    '10039' => '\\ccxt\\BadRequest', // invalid risk limit
                    '10040' => '\\ccxt\\BadRequest', // invalid size step
                    '10050' => '\\ccxt\\BadRequest', // instrument not found
                    '10052' => '\\ccxt\\BadRequest', // max leverage exceeded
                    '10056' => '\\ccxt\\OrderNotFound', // order not found
                    '10061' => '\\ccxt\\BadRequest', // price over liquidation
                    '10065' => '\\ccxt\\BadRequest', // risk limit exceeded
                    '10066' => '\\ccxt\\BadRequest', // risk limit not changed
                    '10070' => '\\ccxt\\BadRequest', // token not found
                    '10075' => '\\ccxt\\AuthenticationError', // unauthorised
                    '10082' => '\\ccxt\\AuthenticationError', // api key not found
                    '10090' => '\\ccxt\\AuthenticationError', // empty api key permission
                    '10091' => '\\ccxt\\BadRequest', // immediate cancellation without fills
                    '10092' => '\\ccxt\\BadRequest', // price under liquidation
                    '10093' => '\\ccxt\\BadRequest', // client order id already exists
                    '10094' => '\\ccxt\\BadRequest', // no position to close
                    '10095' => '\\ccxt\\BadRequest', // amount must not be zero
                    '10098' => '\\ccxt\\BadRequest', // position not found
                    '10099' => '\\ccxt\\BadRequest', // max order count exceeded
                    '10100' => '\\ccxt\\InvalidOrder', // fok order not filled
                    '10101' => '\\ccxt\\BadRequest', // user order margin mode not changed
                    '10102' => '\\ccxt\\BadRequest', // user risk value mode not changed
                    '10103' => '\\ccxt\\InvalidOrder', // order price too high
                    '10104' => '\\ccxt\\InvalidOrder', // order price too low
                    '10106' => '\\ccxt\\InvalidOrder', // close order already exists
                    '10107' => '\\ccxt\\InvalidOrder', // invalid time in force
                    '10117' => '\\ccxt\\InvalidOrder', // post only order rejected
                    '10118' => '\\ccxt\\InvalidOrder', // no orders to cancel
                    '10119' => '\\ccxt\\InvalidOrder', // target order rejected
                    '10120' => '\\ccxt\\InvalidOrder', // invalid order price
                    '10121' => '\\ccxt\\InvalidOrder', // invalid order size
                    '10028' => '\\ccxt\\InsufficientFunds', // insufficient balance
                    '10148' => '\\ccxt\\InvalidOrder', // invalid order type
                    '10187' => '\\ccxt\\PermissionDenied', // cross mode not allowed for leverage lock
                    '10188' => '\\ccxt\\PermissionDenied', // min leverage exceeded for leverage lock
                    '10189' => '\\ccxt\\PermissionDenied', // max leverage exceeded for leverageLock
                ),
            ),
            'precisionMode' => TICK_SIZE,
            'options' => array(
                'Ddx-Expiration' => 5 * 1000, // 5 sec, default
            ),
            'fees' => array(
                'trading' => array(
                    'tierBased' => false,
                    'percentage' => true,
                    'taker' => 0.00075,
                    'maker' => -0.00025,
                ),
                'funding' => array(
                    'tierBased' => false,
                    'percentage' => false,
                    'withdraw' => array(),
                    'deposit' => array(),
                ),
            ),
        ));
    }

    public function fetch_markets($params = array ()) {
        $response = $this->publicGetInstrument ($params);
        $markets = $this->safe_value($response, 'data', array());
        $result = array();
        for ($i = 0; $i < count($markets); $i++) {
            $market = $markets[$i];
            $id = $this->safe_string($market, 'instrumentId');
            $baseId = $this->safe_string($market, 'baseCurrencySymbol');
            $quoteId = $this->safe_string($market, 'quoteCurrencySymbol');
            $base = $this->safe_currency_code($baseId);
            $quote = $this->safe_currency_code($quoteId);
            $symbol = $base . '/' . $quote;
            $precision = array(
                'amount' => null,
                'price' => null,
            );
            $lotSize = $this->safe_float($market, 'lotSize');
            $tickSize = $this->safe_float($market, 'tickSize');
            if ($lotSize !== null) {
                $precision['amount'] = $lotSize;
            }
            if ($tickSize !== null) {
                $precision['price'] = $tickSize;
            }
            $status = $this->safe_string($market, 'status');
            $active = ($status === 'open');
            $result[] = array(
                'id' => $id,
                'symbol' => $symbol,
                'base' => $base,
                'quote' => $quote,
                'active' => $active,
                'precision' => $precision,
                'taker' => $this->safe_float($market, 'takerFee'),
                'maker' => $this->safe_float($market, 'makerFee'),
                'type' => 'future',
                'spot' => false,
                'future' => true,
                'option' => false,
                'inverse' => $this->safe_value($market, 'isInverse'),
                'limits' => array(
                    'amount' => array(
                        'min' => $lotSize,
                        'max' => $this->safe_float($market, 'maxSize'),
                    ),
                    'price' => array(
                        'min' => null,
                        'max' => $this->safe_float($market, 'maxPrice'),
                    ),
                    'cost' => array(
                        'min' => null,
                        'max' => null,
                    ),
                ),
                'info' => $market,
            );
        }
        return $result;
    }

    public function fetch_balance($params = array ()) {
        $this->load_markets();
        $response = $this->privateGetMargin ($params);
        //
        //     {
        //         $code => 0,
        //         data => [array(
        //                 currency => "BTC",
        //                 available => "0.09865794",
        //                 orderMargin => "0.00046317",
        //                 positionMargin => "0.00088501",
        //                 realisedPnl => "0.00000612",
        //                 unrealisedPnl => "0.00001010",
        //                 bonusLeft => "0.00000000"
        //             ),
        //             {
        //                 currency => "USDT",
        //                 available => "1000.0000",
        //                 orderMargin => "0.0000",
        //                 positionMargin => "0.0000",
        //                 realisedPnl => "0.0000",
        //                 unrealisedPnl => "0.0000",
        //                 bonusLeft => "0.0000"
        //             }
        //         ]
        //     }
        //
        $result = array(
            'info' => $response,
        );
        $balances = $this->safe_value($response, 'data', array());
        for ($i = 0; $i < count($balances); $i++) {
            $balance = $balances[$i];
            $currencyId = $this->safe_string($balance, 'currency');
            $code = $this->safe_currency_code($currencyId);
            $account = $this->account();
            $free = $this->safe_float($balance, 'available');
            $used = $this->safe_float($balance, 'orderMargin') . $this->safe_float($balance, 'positionMargin');
            $account['free'] = $free;
            $account['used'] = $used;
            $account['total'] = $free . $used;
            $result[$code] = $account;
        }
        return $this->parse_balance($result);
    }

    public function parse_ticker($ticker, $market = null) {
        //
        //     {
        //         "instrument" => "BTCUSD",
        //         "bestBid" => "10037.00",
        //         "bestAsk" => "10039.00",
        //         "lastPrice" => "10037.50",
        //         "indexPrice" => "10036.01",
        //         "markPrice" => "10036.21",
        //         "fundingRate" => "0.000100",
        //         "nextFundingTime" => "2020-09-09T04:00:00.000Z",
        //         "$open" => "10337.00",
        //         "high" => "10356.50",
        //         "low" => "9850.00",
        //         "close" => "10040.00",
        //         "volume" => 7509236,
        //         "openInterest" => 717585
        //     }
        //
        $timestamp = null;
        $marketId = $this->safe_string($ticker, 'instrument');
        $symbol = null;
        if (is_array($this->markets_by_id) && array_key_exists($marketId, $this->markets_by_id)) {
            $market = $this->markets_by_id[$marketId];
        }
        if ($market !== null) {
            $symbol = $market['symbol'];
        }
        $last = $this->safe_float($ticker, 'lastPrice');
        $open = $this->safe_float($ticker, 'open');
        $change = null;
        $percentage = null;
        $average = null;
        if ($last !== null && $open !== null) {
            $change = $last - $open;
            if ($open > 0) {
                $percentage = $change / $open * 100;
            }
            $average = $this->sum($open, $last) / 2;
        }
        return array(
            'symbol' => $symbol,
            'timestamp' => $timestamp,
            'datetime' => $this->iso8601($timestamp),
            'high' => $this->safe_float($ticker, 'high'),
            'low' => $this->safe_float($ticker, 'low'),
            'bid' => $this->safe_float($ticker, 'bestBid'),
            'bidVolume' => null,
            'ask' => $this->safe_float($ticker, 'bestAsk'),
            'askVolume' => null,
            'vwap' => null,
            'open' => $open,
            'close' => $last,
            'last' => $last,
            'previousClose' => null,
            'change' => $change,
            'percentage' => $percentage,
            'average' => $average,
            'baseVolume' => null,
            'quoteVolume' => $this->safe_float($ticker, 'volume'),
            'info' => $ticker,
        );
    }

    public function fetch_ticker($symbol, $params = array ()) {
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'instrument' => $market['id'],
        );
        $response = $this->publicGetTickerInstrument (array_merge($request, $params));
        //
        //     {
        //         "code" => 0,
        //         "$data" => {
        //             "instrument" => "BTCUSD",
        //             "bestBid" => "10037.00",
        //             "bestAsk" => "10039.00",
        //             "lastPrice" => "10037.50",
        //             "indexPrice" => "10036.01",
        //             "markPrice" => "10036.21",
        //             "fundingRate" => "0.000100",
        //             "nextFundingTime" => "2020-09-09T04:00:00.000Z",
        //             "open" => "10337.00",
        //             "high" => "10356.50",
        //             "low" => "9850.00",
        //             "close" => "10040.00",
        //             "volume" => 7509236,
        //             "openInterest" => 717585
        //         }
        //     }
        //
        $data = $this->safe_value($response, 'data', array());
        return $this->parse_ticker($data);
    }

    public function fetch_tickers($symbols = null, $params = array ()) {
        $this->load_markets();
        $response = $this->publicGetTicker ($params);
        $data = $this->safe_value($response, 'data', array());
        $tickers = array();
        for ($i = 0; $i < count($data); $i++) {
            $ticker = $this->parse_ticker($data[$i]);
            $symbol = $ticker['symbol'];
            $tickers[$symbol] = $ticker;
        }
        return $this->filter_by_array($tickers, 'symbol', $symbols);
    }

    public function fetch_ohlcv($symbol, $timeframe = '1m', $since = null, $limit = null, $params = array ()) {
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'symbol' => $market['id'],
            'resolution' => $this->timeframes[$timeframe],
        );
        if ($limit === null) {
            $limit = 100;
        }
        $duration = $this->parse_timeframe($timeframe);
        $now = $this->seconds();
        if ($since === null) {
            $request['from'] = $now - $limit * $duration;
        } else {
            $request['from'] = intval($since / 1000);
        }
        $request['to'] = $request['from'] . $limit * $duration;
        $response = $this->barsGetTradingViewHistory (array_merge($request, $params));
        return $this->parse_trading_view_ohlcv($response, $market, $timeframe, $since, $limit);
    }

    public function parse_order_status($status) {
        $statuses = array(
            'new' => 'open',
            'partiallyFilled' => 'open',
            'filled' => 'closed',
            'cancelled' => 'canceled',
            'untriggered' => 'open', // Stop order not yet triggered
        );
        return $this->safe_string($statuses, $status, $status);
    }

    public function parse_order_side($side) {
        $sides = array(
            'long' => 'buy',
            'short' => 'sell',
        );
        return $this->safe_string($sides, $side, $side);
    }

    public function convert_order_side($side) {
        $sides = array(
            'buy' => 'long',
            'sell' => 'short',
        );
        return $this->safe_string($sides, $side, $side);
    }

    public function parse_order($order, $market = null) {
        //
        //     {
        //         instrument => "BTCUSD",
        //         orderId => 69839181,
        //         $clientOrderId => "",
        //         $type => "limit",
        //         isCloseOrder => false,
        //         $side => "long",
        //         $price => "8600.00",
        //         size => 1,
        //         timeInForce => "gtc",
        //         notionalValue => "0.00011627",
        //         $status => "new",
        //         fillPrice => "0.00",
        //         filledSize => 0,
        //         accumulatedFees => "0.00000000",
        //         createTime => "2020-09-10T10:02:52.165Z",
        //         updateTime => "2020-09-10T10:02:52.165Z"
        //     }
        //
        $marketId = $this->safe_string($order, 'instrument');
        $symbol = null;
        $settlementCurrency = null;
        if (is_array($this->markets_by_id) && array_key_exists($marketId, $this->markets_by_id)) {
            $market = $this->markets_by_id[$marketId];
        }
        $timestamp = $this->parse8601($this->safe_string($order, 'createTime'));
        $id = $this->safe_value($order, 'orderId');
        $price = $this->safe_float($order, 'price');
        $average = $this->safe_float($order, 'fillPrice');
        $amount = $this->safe_float($order, 'size');
        $filled = $this->safe_float($order, 'filledSize');
        if ($market !== null) {
            $symbol = $market['symbol'];
            if ($market['inverse']) {
                $settlementCurrency = $market['base'];
            } else {
                $settlementCurrency = $market['quote'];
            }
        }
        $remaining = null;
        if (($amount !== null) && ($filled !== null)) {
            $remaining = $amount - $filled;
        }
        $cost = null;
        if (($filled !== null) && ($average !== null)) {
            $cost = $average * $filled;
        }
        $status = $this->parse_order_status($this->safe_string($order, 'status'));
        $side = $this->safe_string_lower($order, 'side');
        $feeCost = $this->safe_float($order, 'accumulatedFees');
        $fee = null;
        if ($feeCost !== null) {
            $fee = array(
                'cost' => abs($feeCost),
                'currency' => $settlementCurrency,
            );
        }
        $type = $this->safe_string($order, 'type');
        $clientOrderId = $this->safe_string($order, 'clientOrderId');
        if (($clientOrderId !== null) && (strlen($clientOrderId) < 1)) {
            $clientOrderId = null;
        }
        return array(
            'info' => $order,
            'id' => $id,
            'clientOrderId' => $clientOrderId,
            'timestamp' => $timestamp,
            'datetime' => $this->iso8601($timestamp),
            'lastTradeTimestamp' => null,
            'symbol' => $symbol,
            'type' => $type,
            'side' => $this->parse_order_side($side),
            'price' => $price,
            'amount' => $amount,
            'cost' => $cost,
            'average' => $average,
            'filled' => $filled,
            'remaining' => $remaining,
            'status' => $status,
            'fee' => $fee,
            'trades' => null,
        );
    }

    public function fetch_order($id, $symbol = null, $params = array ()) {
        if ($symbol === null) {
            throw new ArgumentsRequired($this->id . ' fetchOrder requires a $symbol argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'instrument' => $market['id'],
        );
        $clientOrderId = $this->safe_string($params, 'clientOrderId');
        if ($clientOrderId === null) {
            $request['orderId'] = $id;
        }
        $response = $this->privateGetOrder (array_merge($request, $params));
        $data = $this->safe_value($response, 'data');
        return $this->parse_order($data, $market);
    }

    public function create_order($symbol, $type, $side, $amount, $price = null, $params = array ()) {
        if ($symbol === null) {
            throw new ArgumentsRequired($this->id . ' createOrder requires an $symbol argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'instrument' => $market['id'],
            'type' => $type, // 'limit', 'market', 'stopMarket', 'stopLimit', 'takeProfitMarket', 'takeProfitLimit'
            'side' => $this->convert_order_side($side), // 'long', 'short'
            // 'price' => floatval($this->price_to_precision($symbol, $price)), // required for limit orders
            'size' => intval($this->amount_to_precision($symbol, $amount)), // order quantity in paper, integer only
        );
        $priceIsRequired = false;
        if ($type === 'limit') {
            $priceIsRequired = true;
        }
        if ($priceIsRequired) {
            if ($price !== null) {
                $request['price'] = floatval($this->price_to_precision($symbol, $price));
            } else {
                throw new ArgumentsRequired($this->id . ' createOrder requires a $price argument for a ' . $type . ' order');
            }
        }
        $response = $this->privatePostOrder (array_merge($request, $params));
        $data = $this->safe_value($response, 'data');
        return $this->parse_order($data, $market);
    }

    public function edit_order($id, $symbol, $type, $side, $amount, $price = null, $params = array ()) {
        if ($symbol === null) {
            throw new ArgumentsRequired($this->id . ' editOrder requires an $symbol argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'instrument' => $market['id'],
        );
        $clientOrderId = $this->safe_string($params, 'clientOrderId');
        if ($clientOrderId !== null) {
            $request['clientOrderId'] = $clientOrderId;
        } else {
            $request['orderId'] = $id;
        }
        if ($price !== null) {
            $request['price'] = floatval($this->price_to_precision($symbol, $price));
        }
        // This endpoint has no response data.
        $this->privatePatchOrder (array_merge($request, $params));
        return $this->fetch_order($id, $symbol, $params);
    }

    public function cancel_order($id, $symbol = null, $params = array ()) {
        if ($symbol === null) {
            throw new ArgumentsRequired($this->id . ' cancelOrder requires a $symbol argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'instrument' => $market['id'],
        );
        $clientOrderId = $this->safe_string($params, 'clientOrderId');
        if ($clientOrderId !== null) {
            $request['clientOrderId'] = $clientOrderId;
        } else {
            $request['orderId'] = $id;
        }
        // This endpoint has no response data.
        $this->privateDeleteOrder (array_merge($request, $params));
        return $this->fetch_order($id, $symbol, $params);
    }

    public function cancel_all_orders($symbol = null, $params = array ()) {
        if ($symbol === null) {
            throw new ArgumentsRequired($this->id . ' cancelAllOrders requires a $symbol argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'instrument' => $market['id'],
        );
        // This endpoint has no response data.
        // array( code => 0 )
        return $this->privateDeleteOrder (array_merge($request, $params));
    }

    public function fetch_orders($symbol = null, $since = null, $limit = null, $params = array ()) {
        if ($symbol === null) {
            throw new ArgumentsRequired($this->id . ' fetchOrders requires a $symbol argument');
        }
        $this->load_markets();
        $market = $this->market($symbol);
        $request = array(
            'instrument' => $market['id'],
        );
        if ($since !== null) {
            $request['fromTime'] = $this->iso8601($since);
        }
        if ($limit !== null) {
            $request['limit'] = $limit;
        }
        $response = $this->privateGetOrderAll (array_merge($request, $params));
        $data = $this->safe_value($response, 'data', array());
        return $this->parse_orders($data, $market, $since, $limit);
    }

    public function fetch_closed_orders($symbol = null, $since = null, $limit = null, $params = array ()) {
        $orders = $this->fetch_orders($symbol, $since, $limit, $params);
        return $this->filter_by($orders, 'status', 'closed');
    }

    public function fetch_open_orders($symbol = null, $since = null, $limit = null, $params = array ()) {
        $market = null;
        if ($symbol !== null) {
            $this->load_markets();
            $market = $this->market($symbol);
        }
        $response = $this->privateGetOrderActive ();
        $data = $this->safe_value($response, 'data', array());
        return $this->parse_orders($data, $market, $since, $limit);
    }

    public function sign($path, $api = 'public', $method = 'GET', $params = array (), $headers = null, $body = null) {
        if (!(is_array($this->urls['api']) && array_key_exists($api, $this->urls['api']))) {
            throw new NotSupported($this->id . ' does not have a testnet/sandbox URL for ' . $api . ' endpoints');
        }
        $url = $this->urls['api'][$api];
        $queryString = '';
        $bodyString = '';
        $query = $this->omit($params, $this->extract_params($path));
        $path = $this->implode_params($path, $params);
        $path = '/' . $this->version . '/' . $path;
        $url .= $path;
        if (($method === 'GET') && ($query)) {
            $queryString = $this->urlencode($query);
            $url .= '?' . $queryString;
        }
        if (($method !== 'GET') && ($query)) {
            $bodyString = $this->json($query);
            $body = $bodyString;
            $headers = array(
                'Content-Type' => 'application/json',
            );
        }
        if ($api === 'private') {
            $this->check_required_credentials();
            $timestamp = $this->milliseconds();
            $expiration = $this->safe_integer($this->options, 'Ddx-Expiration', 5000);
            $expiration = $this->sum($timestamp, $expiration);
            $timestamp = (string) $timestamp;
            $expiration = (string) $expiration;
            $message = $method . '|' . $path . '|' . $timestamp . '|' . $expiration . '|' . $queryString . '|' . $bodyString;
            $secret = base64_decode($this->secret);
            $signature = $this->hmac($this->encode($message), $secret, 'sha256', 'hex');
            if ($headers === null) {
                $headers = array();
            }
            $headers = array_merge(array(
                'Ddx-Timestamp' => $timestamp,
                'Ddx-Expiration' => $expiration,
                'Ddx-Key' => $this->apiKey,
                'Ddx-Signature' => $signature,
            ), $headers);
        }
        return array( 'url' => $url, 'method' => $method, 'body' => $body, 'headers' => $headers );
    }

    public function handle_errors($httpCode, $reason, $url, $method, $headers, $body, $response, $requestHeaders, $requestBody) {
        if (!$response) {
            return; // fallback to default error handler
        }
        //
        //     {
        //         "code" => 0,
        //         "data" => array(
        //             ...
        //         ),
        //         "message" => "A short message ONLY WHEN the request is not successful"
        //     }
        //
        $errorCode = $this->safe_value($response, 'code');
        if ($errorCode !== null) {
            if ($errorCode !== 0) {
                $feedback = $this->id . ' ' . $body;
                $this->throw_exactly_matched_exception($this->exceptions['exact'], $errorCode, $feedback);
                throw new ExchangeError($feedback); // unknown message
            }
        } else {
            $status = $this->safe_value($response, 'status');
            if ($status === 400) {
                $feedback = $this->id . ' ' . $body;
                throw new BadRequest($feedback);
            }
        }
    }
}
