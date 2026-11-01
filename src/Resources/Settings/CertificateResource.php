<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Settings\CertificateCsrGenerate;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Settings\Certificate\CopyCertificateRequest;
use spkm\FortiNac\Requests\Settings\Certificate\DeleteCertificateServerCertRequest;
use spkm\FortiNac\Requests\Settings\Certificate\DeleteCertificateViaPostRequest;
use spkm\FortiNac\Requests\Settings\Certificate\GetCertificatesRequest;
use spkm\FortiNac\Requests\Settings\Certificate\PostCertificateCsrGenerateRequest;
use spkm\FortiNac\Requests\Settings\Certificate\RestartCertificateRequest;
use spkm\FortiNac\Requests\Settings\Certificate\UpdateCertificateRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Certificate, from FortiNac::settings()->certificates().
 *
 * @extends BaseResource<Data>
 */
class CertificateResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns all server and/or client CA certificates uploaded to this server: GET /settings/security/certificate-server.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetCertificatesRequest($query));
    }

    /**
     * Copies an uploaded certificate from one target to another: POST /settings/security/certificate-server/copy.
     *
     * @param  array<string, mixed>  $options  Query options: sourceCert, targetCert
     */
    public function copy(array $options = []): bool
    {
        return $this->perform(new CopyCertificateRequest($options));
    }

    /**
     * Generates a Certificate Signing Request for the upload target: POST /settings/security/certificate-server/csr/generate.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function csrGenerate(array|Data $attributes = [], array $options = []): ?CertificateCsrGenerate
    {
        return $this->fetch(new PostCertificateCsrGenerateRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Uploads a certificate chain and optional private key to the specified target name. Uploading certificates to a trust store adds them to the list of trusted certificates: POST /settings/security/certificate-server/{name}.
     *
     * @param  array<string, mixed>  $options  Query options: targetType, privateKeyType, certs, privateKey
     */
    public function update(string $name, array $options = []): bool
    {
        return $this->perform(new UpdateCertificateRequest($name, $options));
    }

    /**
     * Deletes trusted client root CA certificates by SHA1 fingerprint from the trust store at the specified target name: POST /settings/security/certificate-server/{name}/delete.
     *
     * @param  array<string, mixed>  $options  Query options: fingerprint
     */
    public function deleteViaPost(string $name, array $options = []): bool
    {
        return $this->perform(new DeleteCertificateViaPostRequest($name, $options));
    }

    /**
     * Deletes server certificate at the specified target: POST /settings/security/certificate-server/{name}/deleteServerCert.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteServerCert(string $name, array $options = []): bool
    {
        return $this->perform(new DeleteCertificateServerCertRequest($name, $options));
    }

    /**
     * Restarts the processes associated with the target certificate: POST /settings/security/certificate-server/restart.
     *
     * @param  array<string, mixed>  $options  Query options: target
     */
    public function restart(array $options = []): bool
    {
        return $this->perform(new RestartCertificateRequest($options));
    }
}
