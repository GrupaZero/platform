# Snapshot report for `resources/assets/js/components/passport/AuthorizedClients.spec.js`

The actual snapshot is saved in `AuthorizedClients.spec.js.snap`.

Generated by [AVA](https://ava.li).

## Init state without tokens

> Snapshot 1

    '<div><!----></div>'

## Should render OAuth tokens table

> Snapshot 1

    `<div><div><div class="card mb4"><div class="card-header">passport.authorized_applications</div><div class="card-body"><table class="table"><thead class="thead-inverse"><tr><th>passport.name</th><th>passport.scopes</th><th></th></tr></thead><tbody><tr><td style="vertical-align: middle;">␊
                                    OAuth Token 1␊
                                </td><td style="vertical-align: middle;"><span>␊
                                        scope1, scope2␊
                                    </span></td><td style="vertical-align: middle;"><a class="action-link text-danger">␊
                                        passport.revoke␊
                                    </a></td></tr><tr><td style="vertical-align: middle;">␊
                                    OAuth Token 2␊
                                </td><td style="vertical-align: middle;"><span>␊
                                        scope1, scope3␊
                                    </span></td><td style="vertical-align: middle;"><a class="action-link text-danger">␊
                                        passport.revoke␊
                                    </a></td></tr></tbody></table></div></div></div></div>`

## Should render OAuth tokens table after 100 ms delay

> Snapshot 1

    `<div><div><div class="card mb4"><div class="card-header">passport.authorized_applications</div><div class="card-body"><table class="table"><thead class="thead-inverse"><tr><th>passport.name</th><th>passport.scopes</th><th></th></tr></thead><tbody><tr><td style="vertical-align: middle;">␊
                                    OAuth Token 1␊
                                </td><td style="vertical-align: middle;"><span>␊
                                        scope1, scope2␊
                                    </span></td><td style="vertical-align: middle;"><a class="action-link text-danger">␊
                                        passport.revoke␊
                                    </a></td></tr><tr><td style="vertical-align: middle;">␊
                                    OAuth Token 2␊
                                </td><td style="vertical-align: middle;"><span>␊
                                        scope1, scope3␊
                                    </span></td><td style="vertical-align: middle;"><a class="action-link text-danger">␊
                                        passport.revoke␊
                                    </a></td></tr></tbody></table></div></div></div></div>`
