<?php

/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */


$metadata['urn:dev-6xu0s3t43xer76kc.us.auth0.com'] = [
    'entityid' => 'urn:dev-6xu0s3t43xer76kc.us.auth0.com',
    'contacts' => [],
    'metadata-set' => 'saml20-idp-remote',
    'SingleSignOnService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://dev-6xu0s3t43xer76kc.us.auth0.com/samlp/OzeEfjrJAiiU2EIEOYtjaAc1HQx0bi2f',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://dev-6xu0s3t43xer76kc.us.auth0.com/samlp/OzeEfjrJAiiU2EIEOYtjaAc1HQx0bi2f',
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://dev-6xu0s3t43xer76kc.us.auth0.com/samlp/OzeEfjrJAiiU2EIEOYtjaAc1HQx0bi2f/logout',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://dev-6xu0s3t43xer76kc.us.auth0.com/samlp/OzeEfjrJAiiU2EIEOYtjaAc1HQx0bi2f/logout',
        ],
    ],
    'ArtifactResolutionService' => [],
    'NameIDFormats' => [
        'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
        'urn:oasis:names:tc:SAML:2.0:nameid-format:persistent',
        'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
    ],
    'keys' => [
        [
            'encryption' => false,
            'signing' => true,
            'type' => 'X509Certificate',
            'X509Certificate' => 'MIIDHTCCAgWgAwIBAgIJWStEFXp/GbJVMA0GCSqGSIb3DQEBCwUAMCwxKjAoBgNVBAMTIWRldi02eHUwczN0NDN4ZXI3NmtjLnVzLmF1dGgwLmNvbTAeFw0yNDEwMzAyMDEyMjJaFw0zODA3MDkyMDEyMjJaMCwxKjAoBgNVBAMTIWRldi02eHUwczN0NDN4ZXI3NmtjLnVzLmF1dGgwLmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAKWu/YvCsxda1BtL6Bu+737UY7FmxWcrh6fb98o7v4XmQoX8gsXogMm2WUGoG3VNkzazcDTHwSreZZCmZlrsLw/0sn5McM+Wrv5fHxXbWxW7CpizbMx1Pk149fWAjEBST91pQ0k5IecdHQ+U9jDm7U5t1/hy2FxJ1ckQSADjIKqMneBSTgQ936XBAQG0A5BUDa9pH0oQPILE+U4hczJZ/OquAUM6PKZgp4izf/G3I9JISFd20niWoQ0tbTB1jZwc01Bqmc04Li/CjowYLKWkMtTw7gPnlwLHPyQYJ/toeLS62klytWAdr70AUoPkIfJq4FWBPEk3tK0s6ja2081yzdcCAwEAAaNCMEAwDwYDVR0TAQH/BAUwAwEB/zAdBgNVHQ4EFgQUUvoPm1HjXslDTSWIs3jBp4rh8WIwDgYDVR0PAQH/BAQDAgKEMA0GCSqGSIb3DQEBCwUAA4IBAQClXp+o6lUjzqV0nnvx7rzX2PQy5cc7iT5d3xN3cTMN2kcCZSVJ8O/Y2xhv5g6FF+hmALe+GgVUyQLmZqSGsDOObL1AfUihMzYmLcekkY4FiCIw8fQjFsD/34m4frz/oYjHB+6J96hyjKhlAC95xzGhg0y2XkB+g8bcg1XqKpfTPNMrzp2H9nVBRwggBbYkZ3j6AZh0k7B9vqL9y+zE54BPWQLC3zkmvXR5shWoMySiF6Q2sfjWik29f+mI4LhuPDinZS5OpbZUkNG8S/tCiRGLY+qOo5GS/BkC7TPd7XXnLfBRiWmfdXwI9aDR0HsHvuvyI3TFJJ/ZUTznIS77zYVB',
        ],
    ],
];