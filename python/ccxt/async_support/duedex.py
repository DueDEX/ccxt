# -*- coding: utf-8 -*-

# PLEASE DO NOT EDIT THIS FILE, IT IS GENERATED AND WILL BE OVERWRITTEN:
# https://github.com/ccxt/ccxt/blob/master/CONTRIBUTING.md#how-to-contribute-code

from ccxt.async_support.base.exchange import Exchange
import hashlib
from ccxt.base.errors import ExchangeError
from ccxt.base.errors import AuthenticationError
from ccxt.base.errors import PermissionDenied
from ccxt.base.errors import ArgumentsRequired
from ccxt.base.errors import BadRequest
from ccxt.base.errors import InsufficientFunds
from ccxt.base.errors import InvalidOrder
from ccxt.base.errors import OrderNotFound
from ccxt.base.errors import NotSupported
from ccxt.base.errors import RateLimitExceeded
from ccxt.base.errors import InvalidNonce
from ccxt.base.decimal_to_precision import TICK_SIZE


class duedex(Exchange):

    def describe(self):
        return self.deep_extend(super(duedex, self).describe(), {
            'id': 'duedex',
            'name': 'DueDEX',
            'countries': ['BZ'],  # Belize
            'version': 'v1',
            'userAgent': None,
            'rateLimit': 200,
            'has': {
                'cancelOrder': True,
                'CORS': True,
                'cancelAllOrders': True,
                'createOrder': True,
                'editOrder': True,
                'fetchBalance': True,
                'fetchClosedOrders': 'emulated',
                'fetchDeposits': False,
                'fetchLedger': False,
                'fetchMarkets': True,
                'fetchMyTrades': False,
                'fetchOHLCV': True,
                'fetchOpenOrders': True,
                'fetchOrder': True,
                'fetchOrderBook': False,
                'fetchOrders': True,
                'fetchOrderTrades': False,
                'fetchTicker': True,
                'fetchTickers': True,
                'fetchTime': False,
                'fetchTrades': False,
                'fetchTransactions': False,
                'fetchWithdrawals': False,
            },
            'timeframes': {
                '1m': '1',
                '30m': '30',
                '1h': '60',
                '1d': 'D',
            },
            'urls': {
                'test': {
                    'public': 'https://api.testnet.duedex.com',
                    'private': 'https://api.testnet.duedex.com',
                    'bars': 'https://testnet.duedex.com/bars',
                },
                'logo': 'https://avatars3.githubusercontent.com/u/51757131?s=200&v=4',
                'api': {
                    'public': 'https://api.duedex.com',
                    'private': 'https://api.duedex.com',
                    'bars': 'https://www.duedex.com/bars',
                },
                'www': 'https://www.duedex.com',
                'doc': [
                    'https://github.com/DueDEX/API-Documentation',
                ],
                'fees': 'https://duedex.zendesk.com/hc/en-us/articles/360022357973-Perpetual-Swaps-Trading-Fees',
                'referral': 'https://www.duedex.com/register?code=BEFTWN',
            },
            'api': {
                'public': {
                    'get': [
                        'instrument',
                        'ticker',
                        'ticker/{instrument}',
                    ],
                },
                'private': {
                    'get': [
                        'order/active',
                        'order',
                        'order/all',
                        'position',
                        'margin',
                    ],
                    'post': [
                        'order',
                        'position/leverage',
                        'position/riskLimit',
                        'position/margin/transfer',
                    ],
                    'delete': [
                        'order',
                    ],
                    'patch': [
                        'order',
                    ],
                },
                'bars': {
                    'get': [
                        'tradingView/history',
                    ],
                },
            },
            'exceptions': {
                'exact': {
                    '-1': ExchangeError,  # internal server error
                    '100': ExchangeError,  # service unavailable
                    '1000': BadRequest,  # invalid argument
                    '5000': BadRequest,  # endpoint not found
                    '5001': BadRequest,  # header missing
                    '5002': AuthenticationError,  # api key not found
                    '5003': InvalidNonce,  # invalid timestamp
                    '5004': BadRequest,  # invalid expiration
                    '5005': AuthenticationError,  # invalid signature
                    '5006': BadRequest,  # duplicate parameter
                    '5007': BadRequest,  # unsupported charset
                    '5008': BadRequest,  # request too large
                    '5009': BadRequest,  # unsupported mime type
                    '5010': RateLimitExceeded,  # rate limit exceeded
                    '5011': PermissionDenied,  # insufficient permission
                    '5012': PermissionDenied,  # not in ip whitelist
                    '10035': BadRequest,  # invalid leverage
                    '10036': BadRequest,  # invalid instrument status
                    '10037': InvalidOrder,  # invalid order status
                    '10038': BadRequest,  # invalid price step
                    '10039': BadRequest,  # invalid risk limit
                    '10040': BadRequest,  # invalid size step
                    '10050': BadRequest,  # instrument not found
                    '10052': BadRequest,  # max leverage exceeded
                    '10056': OrderNotFound,  # order not found
                    '10061': BadRequest,  # price over liquidation
                    '10065': BadRequest,  # risk limit exceeded
                    '10066': BadRequest,  # risk limit not changed
                    '10070': BadRequest,  # token not found
                    '10075': AuthenticationError,  # unauthorised
                    '10082': AuthenticationError,  # api key not found
                    '10090': AuthenticationError,  # empty api key permission
                    '10091': BadRequest,  # immediate cancellation without fills
                    '10092': BadRequest,  # price under liquidation
                    '10093': BadRequest,  # client order id already exists
                    '10094': BadRequest,  # no position to close
                    '10095': BadRequest,  # amount must not be zero
                    '10098': BadRequest,  # position not found
                    '10099': BadRequest,  # max order count exceeded
                    '10100': InvalidOrder,  # fok order not filled
                    '10101': BadRequest,  # user order margin mode not changed
                    '10102': BadRequest,  # user risk value mode not changed
                    '10103': InvalidOrder,  # order price too high
                    '10104': InvalidOrder,  # order price too low
                    '10106': InvalidOrder,  # close order already exists
                    '10107': InvalidOrder,  # invalid time in force
                    '10117': InvalidOrder,  # post only order rejected
                    '10118': InvalidOrder,  # no orders to cancel
                    '10119': InvalidOrder,  # target order rejected
                    '10120': InvalidOrder,  # invalid order price
                    '10121': InvalidOrder,  # invalid order size
                    '10028': InsufficientFunds,  # insufficient balance
                    '10148': InvalidOrder,  # invalid order type
                    '10187': PermissionDenied,  # cross mode not allowed for leverage lock
                    '10188': PermissionDenied,  # min leverage exceeded for leverage lock
                    '10189': PermissionDenied,  # max leverage exceeded for leverageLock
                },
            },
            'precisionMode': TICK_SIZE,
            'options': {
                'Ddx-Expiration': 5 * 1000,  # 5 sec, default
            },
            'fees': {
                'trading': {
                    'tierBased': False,
                    'percentage': True,
                    'taker': 0.00075,
                    'maker': -0.00025,
                },
                'funding': {
                    'tierBased': False,
                    'percentage': False,
                    'withdraw': {},
                    'deposit': {},
                },
            },
        })

    async def fetch_markets(self, params={}):
        response = await self.publicGetInstrument(params)
        markets = self.safe_value(response, 'data', [])
        result = []
        for i in range(0, len(markets)):
            market = markets[i]
            id = self.safe_string(market, 'instrumentId')
            baseId = self.safe_string(market, 'baseCurrencySymbol')
            quoteId = self.safe_string(market, 'quoteCurrencySymbol')
            base = self.safe_currency_code(baseId)
            quote = self.safe_currency_code(quoteId)
            symbol = base + '/' + quote
            precision = {
                'amount': None,
                'price': None,
            }
            lotSize = self.safe_float(market, 'lotSize')
            tickSize = self.safe_float(market, 'tickSize')
            if lotSize is not None:
                precision['amount'] = lotSize
            if tickSize is not None:
                precision['price'] = tickSize
            status = self.safe_string(market, 'status')
            active = (status == 'open')
            result.append({
                'id': id,
                'symbol': symbol,
                'base': base,
                'quote': quote,
                'active': active,
                'precision': precision,
                'taker': self.safe_float(market, 'takerFee'),
                'maker': self.safe_float(market, 'makerFee'),
                'type': 'future',
                'spot': False,
                'future': True,
                'option': False,
                'inverse': self.safe_value(market, 'isInverse'),
                'limits': {
                    'amount': {
                        'min': lotSize,
                        'max': self.safe_float(market, 'maxSize'),
                    },
                    'price': {
                        'min': None,
                        'max': self.safe_float(market, 'maxPrice'),
                    },
                    'cost': {
                        'min': None,
                        'max': None,
                    },
                },
                'info': market,
            })
        return result

    async def fetch_balance(self, params={}):
        await self.load_markets()
        response = await self.privateGetMargin(params)
        #
        #     {
        #         code: 0,
        #         data: [{
        #                 currency: "BTC",
        #                 available: "0.09865794",
        #                 orderMargin: "0.00046317",
        #                 positionMargin: "0.00088501",
        #                 realisedPnl: "0.00000612",
        #                 unrealisedPnl: "0.00001010",
        #                 bonusLeft: "0.00000000"
        #             },
        #             {
        #                 currency: "USDT",
        #                 available: "1000.0000",
        #                 orderMargin: "0.0000",
        #                 positionMargin: "0.0000",
        #                 realisedPnl: "0.0000",
        #                 unrealisedPnl: "0.0000",
        #                 bonusLeft: "0.0000"
        #             }
        #         ]
        #     }
        #
        result = {
            'info': response,
        }
        balances = self.safe_value(response, 'data', [])
        for i in range(0, len(balances)):
            balance = balances[i]
            currencyId = self.safe_string(balance, 'currency')
            code = self.safe_currency_code(currencyId)
            account = self.account()
            free = self.safe_float(balance, 'available')
            used = self.safe_float(balance, 'orderMargin') + self.safe_float(balance, 'positionMargin')
            account['free'] = free
            account['used'] = used
            account['total'] = free + used
            result[code] = account
        return self.parse_balance(result)

    def parse_ticker(self, ticker, market=None):
        #
        #     {
        #         "instrument": "BTCUSD",
        #         "bestBid": "10037.00",
        #         "bestAsk": "10039.00",
        #         "lastPrice": "10037.50",
        #         "indexPrice": "10036.01",
        #         "markPrice": "10036.21",
        #         "fundingRate": "0.000100",
        #         "nextFundingTime": "2020-09-09T04:00:00.000Z",
        #         "open": "10337.00",
        #         "high": "10356.50",
        #         "low": "9850.00",
        #         "close": "10040.00",
        #         "volume": 7509236,
        #         "openInterest": 717585
        #     }
        #
        timestamp = None
        marketId = self.safe_string(ticker, 'instrument')
        symbol = None
        if marketId in self.markets_by_id:
            market = self.markets_by_id[marketId]
        if market is not None:
            symbol = market['symbol']
        last = self.safe_float(ticker, 'lastPrice')
        open = self.safe_float(ticker, 'open')
        change = None
        percentage = None
        average = None
        if last is not None and open is not None:
            change = last - open
            if open > 0:
                percentage = change / open * 100
            average = self.sum(open, last) / 2
        return {
            'symbol': symbol,
            'timestamp': timestamp,
            'datetime': self.iso8601(timestamp),
            'high': self.safe_float(ticker, 'high'),
            'low': self.safe_float(ticker, 'low'),
            'bid': self.safe_float(ticker, 'bestBid'),
            'bidVolume': None,
            'ask': self.safe_float(ticker, 'bestAsk'),
            'askVolume': None,
            'vwap': None,
            'open': open,
            'close': last,
            'last': last,
            'previousClose': None,
            'change': change,
            'percentage': percentage,
            'average': average,
            'baseVolume': None,
            'quoteVolume': self.safe_float(ticker, 'volume'),
            'info': ticker,
        }

    async def fetch_ticker(self, symbol, params={}):
        await self.load_markets()
        market = self.market(symbol)
        request = {
            'instrument': market['id'],
        }
        response = await self.publicGetTickerInstrument(self.extend(request, params))
        #
        #     {
        #         "code": 0,
        #         "data": {
        #             "instrument": "BTCUSD",
        #             "bestBid": "10037.00",
        #             "bestAsk": "10039.00",
        #             "lastPrice": "10037.50",
        #             "indexPrice": "10036.01",
        #             "markPrice": "10036.21",
        #             "fundingRate": "0.000100",
        #             "nextFundingTime": "2020-09-09T04:00:00.000Z",
        #             "open": "10337.00",
        #             "high": "10356.50",
        #             "low": "9850.00",
        #             "close": "10040.00",
        #             "volume": 7509236,
        #             "openInterest": 717585
        #         }
        #     }
        #
        data = self.safe_value(response, 'data', {})
        return self.parse_ticker(data)

    async def fetch_tickers(self, symbols=None, params={}):
        await self.load_markets()
        response = await self.publicGetTicker(params)
        data = self.safe_value(response, 'data', [])
        tickers = {}
        for i in range(0, len(data)):
            ticker = self.parse_ticker(data[i])
            symbol = ticker['symbol']
            tickers[symbol] = ticker
        return self.filter_by_array(tickers, 'symbol', symbols)

    async def fetch_ohlcv(self, symbol, timeframe='1m', since=None, limit=None, params={}):
        await self.load_markets()
        market = self.market(symbol)
        request = {
            'symbol': market['id'],
            'resolution': self.timeframes[timeframe],
        }
        if limit is None:
            limit = 100
        duration = self.parse_timeframe(timeframe)
        now = self.seconds()
        if since is None:
            request['from'] = now - limit * duration
        else:
            request['from'] = int(since / 1000)
        request['to'] = request['from'] + limit * duration
        response = await self.barsGetTradingViewHistory(self.extend(request, params))
        return self.parse_trading_view_ohlcv(response, market, timeframe, since, limit)

    def parse_order_status(self, status):
        statuses = {
            'new': 'open',
            'partiallyFilled': 'open',
            'filled': 'closed',
            'cancelled': 'canceled',
            'untriggered': 'open',  # Stop order not yet triggered
        }
        return self.safe_string(statuses, status, status)

    def parse_order_side(self, side):
        sides = {
            'long': 'buy',
            'short': 'sell',
        }
        return self.safe_string(sides, side, side)

    def convert_order_side(self, side):
        sides = {
            'buy': 'long',
            'sell': 'short',
        }
        return self.safe_string(sides, side, side)

    def parse_order(self, order, market=None):
        #
        #     {
        #         instrument: "BTCUSD",
        #         orderId: 69839181,
        #         clientOrderId: "",
        #         type: "limit",
        #         isCloseOrder: False,
        #         side: "long",
        #         price: "8600.00",
        #         size: 1,
        #         timeInForce: "gtc",
        #         notionalValue: "0.00011627",
        #         status: "new",
        #         fillPrice: "0.00",
        #         filledSize: 0,
        #         accumulatedFees: "0.00000000",
        #         createTime: "2020-09-10T10:02:52.165Z",
        #         updateTime: "2020-09-10T10:02:52.165Z"
        #     }
        #
        marketId = self.safe_string(order, 'instrument')
        symbol = None
        settlementCurrency = None
        if marketId in self.markets_by_id:
            market = self.markets_by_id[marketId]
        timestamp = self.parse8601(self.safe_string(order, 'createTime'))
        id = self.safe_value(order, 'orderId')
        price = self.safe_float(order, 'price')
        average = self.safe_float(order, 'fillPrice')
        amount = self.safe_float(order, 'size')
        filled = self.safe_float(order, 'filledSize')
        if market is not None:
            symbol = market['symbol']
            if market['inverse']:
                settlementCurrency = market['base']
            else:
                settlementCurrency = market['quote']
        remaining = None
        if (amount is not None) and (filled is not None):
            remaining = amount - filled
        cost = None
        if (filled is not None) and (average is not None):
            cost = average * filled
        status = self.parse_order_status(self.safe_string(order, 'status'))
        side = self.safe_string_lower(order, 'side')
        feeCost = self.safe_float(order, 'accumulatedFees')
        fee = None
        if feeCost is not None:
            fee = {
                'cost': abs(feeCost),
                'currency': settlementCurrency,
            }
        type = self.safe_string(order, 'type')
        clientOrderId = self.safe_string(order, 'clientOrderId')
        if (clientOrderId is not None) and (len(clientOrderId) < 1):
            clientOrderId = None
        return {
            'info': order,
            'id': id,
            'clientOrderId': clientOrderId,
            'timestamp': timestamp,
            'datetime': self.iso8601(timestamp),
            'lastTradeTimestamp': None,
            'symbol': symbol,
            'type': type,
            'side': self.parse_order_side(side),
            'price': price,
            'amount': amount,
            'cost': cost,
            'average': average,
            'filled': filled,
            'remaining': remaining,
            'status': status,
            'fee': fee,
            'trades': None,
        }

    async def fetch_order(self, id, symbol=None, params={}):
        if symbol is None:
            raise ArgumentsRequired(self.id + ' fetchOrder requires a symbol argument')
        await self.load_markets()
        market = self.market(symbol)
        request = {
            'instrument': market['id'],
        }
        clientOrderId = self.safe_string(params, 'clientOrderId')
        if clientOrderId is None:
            request['orderId'] = id
        response = await self.privateGetOrder(self.extend(request, params))
        data = self.safe_value(response, 'data')
        return self.parse_order(data, market)

    async def create_order(self, symbol, type, side, amount, price=None, params={}):
        if symbol is None:
            raise ArgumentsRequired(self.id + ' createOrder requires an symbol argument')
        await self.load_markets()
        market = self.market(symbol)
        request = {
            'instrument': market['id'],
            'type': type,  # 'limit', 'market', 'stopMarket', 'stopLimit', 'takeProfitMarket', 'takeProfitLimit'
            'side': self.convert_order_side(side),  # 'long', 'short'
            # 'price': float(self.price_to_precision(symbol, price)),  # required for limit orders
            'size': int(self.amount_to_precision(symbol, amount)),  # order quantity in paper, integer only
        }
        priceIsRequired = False
        if type == 'limit':
            priceIsRequired = True
        if priceIsRequired:
            if price is not None:
                request['price'] = float(self.price_to_precision(symbol, price))
            else:
                raise ArgumentsRequired(self.id + ' createOrder requires a price argument for a ' + type + ' order')
        response = await self.privatePostOrder(self.extend(request, params))
        data = self.safe_value(response, 'data')
        return self.parse_order(data, market)

    async def edit_order(self, id, symbol, type, side, amount, price=None, params={}):
        if symbol is None:
            raise ArgumentsRequired(self.id + ' editOrder requires an symbol argument')
        await self.load_markets()
        market = self.market(symbol)
        request = {
            'instrument': market['id'],
        }
        clientOrderId = self.safe_string(params, 'clientOrderId')
        if clientOrderId is not None:
            request['clientOrderId'] = clientOrderId
        else:
            request['orderId'] = id
        if price is not None:
            request['price'] = float(self.price_to_precision(symbol, price))
        # This endpoint has no response data.
        await self.privatePatchOrder(self.extend(request, params))
        return await self.fetch_order(id, symbol, params)

    async def cancel_order(self, id, symbol=None, params={}):
        if symbol is None:
            raise ArgumentsRequired(self.id + ' cancelOrder requires a symbol argument')
        await self.load_markets()
        market = self.market(symbol)
        request = {
            'instrument': market['id'],
        }
        clientOrderId = self.safe_string(params, 'clientOrderId')
        if clientOrderId is not None:
            request['clientOrderId'] = clientOrderId
        else:
            request['orderId'] = id
        # This endpoint has no response data.
        await self.privateDeleteOrder(self.extend(request, params))
        return await self.fetch_order(id, symbol, params)

    async def cancel_all_orders(self, symbol=None, params={}):
        if symbol is None:
            raise ArgumentsRequired(self.id + ' cancelAllOrders requires a symbol argument')
        await self.load_markets()
        market = self.market(symbol)
        request = {
            'instrument': market['id'],
        }
        # This endpoint has no response data.
        # {code: 0}
        return await self.privateDeleteOrder(self.extend(request, params))

    async def fetch_orders(self, symbol=None, since=None, limit=None, params={}):
        if symbol is None:
            raise ArgumentsRequired(self.id + ' fetchOrders requires a symbol argument')
        await self.load_markets()
        market = self.market(symbol)
        request = {
            'instrument': market['id'],
        }
        if since is not None:
            request['fromTime'] = self.iso8601(since)
        if limit is not None:
            request['limit'] = limit
        response = await self.privateGetOrderAll(self.extend(request, params))
        data = self.safe_value(response, 'data', [])
        return self.parse_orders(data, market, since, limit)

    async def fetch_closed_orders(self, symbol=None, since=None, limit=None, params={}):
        orders = await self.fetch_orders(symbol, since, limit, params)
        return self.filter_by(orders, 'status', 'closed')

    async def fetch_open_orders(self, symbol=None, since=None, limit=None, params={}):
        market = None
        if symbol is not None:
            await self.load_markets()
            market = self.market(symbol)
        response = await self.privateGetOrderActive()
        data = self.safe_value(response, 'data', [])
        return self.parse_orders(data, market, since, limit)

    def sign(self, path, api='public', method='GET', params={}, headers=None, body=None):
        if not (api in self.urls['api']):
            raise NotSupported(self.id + ' does not have a testnet/sandbox URL for ' + api + ' endpoints')
        url = self.urls['api'][api]
        queryString = ''
        bodyString = ''
        query = self.omit(params, self.extract_params(path))
        path = self.implode_params(path, params)
        path = '/' + self.version + '/' + path
        url += path
        if (method == 'GET') and (query):
            queryString = self.urlencode(query)
            url += '?' + queryString
        if (method != 'GET') and (query):
            bodyString = self.json(query)
            body = bodyString
            headers = {
                'Content-Type': 'application/json',
            }
        if api == 'private':
            self.check_required_credentials()
            timestamp = self.milliseconds()
            expiration = self.safe_integer(self.options, 'Ddx-Expiration', 5000)
            expiration = self.sum(timestamp, expiration)
            timestamp = str(timestamp)
            expiration = str(expiration)
            message = method + '|' + path + '|' + timestamp + '|' + expiration + '|' + queryString + '|' + bodyString
            secret = self.base64_to_binary(self.secret)
            signature = self.hmac(self.encode(message), secret, hashlib.sha256, 'hex')
            if headers is None:
                headers = {}
            headers = self.extend({
                'Ddx-Timestamp': timestamp,
                'Ddx-Expiration': expiration,
                'Ddx-Key': self.apiKey,
                'Ddx-Signature': signature,
            }, headers)
        return {'url': url, 'method': method, 'body': body, 'headers': headers}

    def handle_errors(self, httpCode, reason, url, method, headers, body, response, requestHeaders, requestBody):
        if not response:
            return  # fallback to default error handler
        #
        #     {
        #         "code": 0,
        #         "data": {
        #             ...
        #         },
        #         "message": "A short message ONLY WHEN the request is not successful"
        #     }
        #
        errorCode = self.safe_value(response, 'code')
        if errorCode is not None:
            if errorCode != 0:
                feedback = self.id + ' ' + body
                self.throw_exactly_matched_exception(self.exceptions['exact'], errorCode, feedback)
                raise ExchangeError(feedback)  # unknown message
        else:
            status = self.safe_value(response, 'status')
            if status == 400:
                feedback = self.id + ' ' + body
                raise BadRequest(feedback)
