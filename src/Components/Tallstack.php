<?php

namespace WireUi\Breadcrumbs\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use WireUi\Breadcrumbs\Breadcrumbs;
use WireUi\Breadcrumbs\Contracts\Repository;

class Tallstack extends Component
{
    public const EVENT = 'wireui::breadcrumbs';

    /** @var array<int, array{label: string, url: string|null}> */
    public array $breadcrumbs = [];

    public string $home = '';

    public function __construct(Request $request)
    {
        if (session()->exists(self::EVENT)) {
            $this->breadcrumbs = Arr::wrap(session()->get(self::EVENT));
        }

        if (!$this->breadcrumbs) {
            $this->breadcrumbs = $this->getBreadcrumbsFromRequest($request);
        }

        /** @var string $home */
        $home = value(config('wireui.breadcrumbs.home'));

        $this->home = $home;
    }

    /**
     * @return array<int, array{label: string, url: string|null}>
     */
    public function getBreadcrumbsFromRequest(Request $request): array
    {
        $route = $request->route()?->getName();

        $breadcrumbs = $route
            ? app(Repository::class)->get($route)
            : null;

        if ($breadcrumbs instanceof Breadcrumbs) {
            return $breadcrumbs->toTrail()->toArray();
        }

        return [];
    }

    public function render(): View
    {
        return view('wireui::tallstack'); // @phpstan-ignore-line
    }
}
