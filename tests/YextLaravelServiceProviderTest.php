<?php


namespace KevinEm\YextLaravel\Tests;


use ArrayAccess;
use Closure;
use KevinEm\YextLaravel\Facades\YextLaravel;
use KevinEm\YextLaravel\YextLaravelServiceProvider;
use Mockery as m;
use ReflectionClass;

class YextLaravelServiceProviderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var MockInterface
     */
    protected $app;

    /**
     * @var MockInterface
     */
    protected $config;

    /**
     * @var YextLaravelServiceProvider
     */
    protected $provider;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->config = m::mock(ArrayAccess::class);

        $this->app = m::mock(ArrayAccess::class);
        $this->app->shouldReceive('offsetGet')->zeroOrMoreTimes()->with('path.config')->andReturn('/some/config/path');
        $this->app->shouldReceive('offsetGet')->zeroOrMoreTimes()->with('config')->andReturn($this->config);

        $this->provider = new YextLaravelServiceProvider($this->app);
    }

    public function testBoot()
    {
        $this->provider->boot();
    }

    public function testRegister()
    {
        $this->config->shouldReceive('get')->withAnyArgs()->once()->andReturn([]);
        $this->config->shouldReceive('set')->withAnyArgs()->once()->andReturnUndefined();
        $this->app->shouldReceive('bind')->withAnyArgs()->twice()->andReturnUndefined();
        $this->config->shouldReceive('offsetGet')->zeroOrMoreTimes()->with('yext')->andReturn([]);

        $this->provider->register();
    }

    public function testFacade()
    {
        $facade = new YextLaravel();
        $facade->shouldReceive();
    }

    public function testCreateYextLaravelClosure()
    {
        $method = self::getMethod('createYextLaravelClosure');

        $app = [
            'config' => $this->config
        ];

        $this->config->shouldReceive('offsetGet')->andReturn([]);

        $closure = $method->invokeArgs($this->provider, []);

        $this->assertInstanceOf(Closure::class, $closure);
        $this->assertNotNull($closure($app));
    }

    /**
     * @param string $name
     *
     * @return ReflectionMethod
     */
    protected static function getMethod($name)
    {
        $class = new ReflectionClass(YextLaravelServiceProvider::class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }
}