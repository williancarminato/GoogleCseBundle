GoogleCseBundle [![Build Status](https://travis-ci.org/williancarminato/GoogleCseBundle.png?branch=develop)](https://travis-ci.org/williancarminato/GoogleCseBundle) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/8cc1ec21-d475-4e26-9e7f-d2b7fc86a4f6/small.png)](https://insight.sensiolabs.com/projects/8cc1ec21-d475-4e26-9e7f-d2b7fc86a4f6)
===============

A Symfony2 Bundle who uses Google Custom Search API.

Feature
--------

  - Google Custom Search feature, see [CSE](https://developers.google.com/custom-search/json-api/v1/introduction)

Requirements
------------

  - PHP 5.4+
  - Search engine ID ([Creating a Custom Search Engine](https://developers.google.com/custom-search/docs/tutorial/creatingcse))
  - API key that can be obtained from the [Google Cloud Console](https://cloud.google.com/console)

Instalation
-----------

Package available on [Packagist](https://packagist.org/packages/williancarminato/google-cse-bundle). Autoloading with [Composer](http://getcomposer.org/) is [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md) compatible.

Usage
-----

Let's suppose that you have a form with the input text 'search_term'. In your controller you can get the results after form submission like this:

```php
<?php

    ...
    use Carminato\GoogleCseBundle\Service\ApiRequest;
    use Carminato\GoogleCseBundle\Service\Query\ApiQuery;

    class SearchController extends Controller
    {
    ...
        public function searchAction(Request $request)
        {
            $filter = $this->createForm(new SearchFilterType());
            $filter->bind($request);

            if ($filter->isValid()) {
                $data = $filter->getData();

                $apiQuery = new ApiQuery(
                    array(
                        'key' => API_KEY,
                        'cx' => CX_KEY,
                        'q' => $data['search_term'],
                        'start' => 1,
                        'userIp' => $request->getClientIp()
                    )
                );

                $apiRequest = new ApiRequest($apiQuery);

                $response = $apiRequest->getResponse();

                if ($error = $response->getErrors()) {
                    return new Response($error->getMessage(), $error->getCode());
                }

                return array(
                    'results' => $response->getResults()
                );
            }
            ...
        }
    }
```

The results is an array containing [CseApiResultItem](https://github.com/williancarminato/GoogleCseBundle/blob/develop/Model/CseApiResultItem.php) objects.

Enjoy!
------
