$.(function()
var defaultData = [
        {
            text: 'data',
            href: '#parent1',
            tags: ['4'],
            nodes: [
                {
                    text: '子节点 1',
                    href: '#child1',
                    tags: ['2'],
                    nodes: [
                        {
                            text: '孙子节点 1',
                            href: '#grandchild1',
                            tags: ['0']
                  },
                        {
                            text: '孙子节点 2',
                            href: '#grandchild2',
                            tags: ['0']
                  }
                ]
              },
                {
                    text: '子节点 2',
                    href: '#child2',
                    tags: ['0']
              }
            ]
          },
        {
            text: '父节点 2',
            href: '#parent2',
            tags: ['0']
          },
        {
            text: '父节点 3',
            href: '#parent3',
            tags: ['0']
          },
        {
            text: '父节点 4',
            href: '#parent4',
            tags: ['0']
          },
        {
            text: '父节点 5',
            href: '#parent5',
            tags: ['0']
          }
        ];
    $('#treeview2').treeview({
        levels: 1,
        data: defaultData
    });
);