<?php

namespace App\Structural\Proxy;

/**
 * EN: A Protection Proxy. It guards access to the wrapped service and
 * delegates only when the caller is allowed. Because it depends on the
 * interface, it can wrap the real subject or another proxy alike.
 * RU: Защищающий заместитель. Охраняет доступ к обернутому сервису и
 * делегирует вызов только тогда, когда вызывающему это разрешено. Так как
 * он зависит от интерфейса, он может обернуть и реальный субъект, и другой заместитель.
 */
class AccessControlledReportProxy implements ReportServiceInterface
{
    public function __construct(
        private readonly ReportServiceInterface $service,
        private readonly string $role
    ) {}

    public function getReport(string $id): string
    {
        if ($this->role !== 'analyst') {
            echo "AccessControlledReportProxy: role '{$this->role}' is not allowed to read reports" . PHP_EOL;

            throw new \RuntimeException("Access denied for role '{$this->role}'");
        }

        echo "AccessControlledReportProxy: role '{$this->role}' granted" . PHP_EOL;

        return $this->service->getReport($id);
    }
}
