<?php if (get_field('collections_call_to_action', 10)): ?>    
                        <?php
                        $link_collections = get_field('collections_call_to_action', 10);

                        if ($link_collections):
                            $link_collections_url = $link_collections['url'];
                            $link_collections_title = $link_collections['title'];
                            $link_collections_target = $link_collections['target'] ? $link_collections['target'] : '_self';
                            ?>
                            <a class="button" href="<?php echo esc_url($link_collections_url); ?>" target="<?php echo esc_attr($link_collections_target); ?>">
                                <?php echo esc_html($link_collections_title); ?>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>