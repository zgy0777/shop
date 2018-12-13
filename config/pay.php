<?php

return [
    'alipay' => [
        'app_id'         => '2016092000553182',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwjo0d03yaaOJWRKOcKBA+AP9YU/oer6LjTBB287tAA6uimMHYplC0ci9obYszQxOpvJG/t3V+YeoZW9a5BeQw9HWK2ISAy30FDLhvoU/IQk8MLdC5AddXPzb9W8XdS0eBXV6vqeyWybyl0m7mzfN/XQYZSQy6svcRQFnJj0ULY74OCKhN0M9i4+T3YbRqTWU9fcFqePqG1UHv3IiH+jkfAL/AvkS7aAHVd6Q62aT8s/RFojVbUCFAQq7ba1ZPeo0RsKhfO8NO0AJiIrLgdTZcdjNrjjKTWw8L65Sj9TrryRyH/iC8uGcohL2pYBeKo6tUwGNWoqPZHCfxAPexU9KvwIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEA2A4f/OoZjVQv0tAdQirBA9F/I6bphpTqbJaD70m6PkU60x2Qjr0YUjHXO45qV2hFL4+iNmuw6mWxjILd9S0BXO++SgDhBHJIROdIK2xiM9PFp7oGqFBmeNeEyfk2Oc/DAu8dNIlVjE2t9QRDKopVjGESPgIMTvxxTm/g+A7fcs67WZBYuIm8t+Aa5l6PWg8WJ5UAtpldV590aSXPHW3sGT9ZcYGRlgdYRhy3xcNEAso1ElqatwtazKteCXQdz36cAymNzPWaxLCWU5GoHZWJwII4tnPxkz2v8p3nzMk2hCalo38OVgWM5bzHXI4pAtpmmrtQVQUGL06rxPb6phZsdQIDAQABAoIBAQCw92DcGCO1zy8czbopaDuQlRg+a4j74x3gs6h9ZzZVqv7zzVOKlvhE2u4gqhYQYifJPSzwxmSymXlETizflW14YibLFs04hyMKzSYf6zbEnMFZENZDJxfIAz+Q77+qurJQxOp3DcY0lavW9RbO0WAhC6GViLfsOnnUdW8fv47myUz2H/u668/3Cr5dIaKub8qrp5q14SyfES9FVxcqAkleDp95TxyM5YKhIMXRnYqWymgpDetrVCOzlYwZi73t44G3a9RJEK0Sqn55X1DxaieJo82WgpCnlFJHcu49t/ePurId4FwxV/FNC+UPRg+18BXgmEcEvkbckkwFavPr2vZBAoGBAO+D6sVx0nKiYQTbbtTQ6DTIFd3Y0W1RVqc0Q3att7MXg6lKKXDJs2nNuya3yK5t0ZvLPAjueMzs8j41eWEw+CvDCiMXxu/ZSGnofX56Im9bACDo/g/m67ZODQKzT81gK7A2LIlN7SwAJv5ryjjoHNwwhkk6P8F6+QzE33XpauerAoGBAObs25b2j48zqWi3/nTLJJ/F9krwHRS5wwxudp7voOryNJDBQZcqLAbbGjBxO/61TNfoKw/es+dXefIz2zAFc9J6Wrm8QUGuLM204BL5AoMRSm7Q+EA94nKuYmYM2r/cjIm4n2LW3AJonMt7R8vNhY2xVM9qtkHn308SwMrne1xfAoGAeaNSILH8gbFLek8Ci1wJAX039bG+Mjlju4jEVkpFB9QCToBWaWxWDH6p9DDT3xnwoKFnPNX3TYNsRwGbQiu/bWIhDM9vfbGon/itewUF5e2eNBh/po3M2Ynr+5obBh84MMZiedy0fWsaYo1VZu8icQTHvfqyFE2im8SEA/rmCv8CgYEAgyQL6IWJLYfnM0MaTHV5DQs9PX1y5mxAKnUpBEWNmx+FXpeBijk224XeL5h+u712MD73BYIxpLV22Wc9mN3f0q4Ni+EvJf+mDgQkJGIpXQmavagK82CxkvMZil7Oc5rqbOPeECF4vB1wvdX7BfBnYfpM8aXmbzMhDCTYO+KNmf0CgYB4RNUitg4oMPvdt/kovsoFZMrEcTMcGQh7CTWZ5W3jzG4oS0tQEfefCRLxp0KDlUaeR4IV0+eU9Zk00OCnGfpTT9DU5Y2E8ICp2jC3u5RazWmzmn7ERiKHZisfmVOeqZQ6irrsayXCULZ/SncWI1cVvwt/PzJzMKuRTEk/csvXjg==',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];