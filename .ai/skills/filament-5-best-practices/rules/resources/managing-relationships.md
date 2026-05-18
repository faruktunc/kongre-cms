> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Managing relationships

export const UtilityInjection = ({extras, except, set, version, children}) => {
  const parsedExtras = (extras ?? '').split('||').filter(extra => extra !== '').map(extra => {
    const [name, type, parameter, description] = extra.split(';;');
    return {
      name,
      type,
      parameter,
      description
    };
  });
  const utilitySets = {
    '5.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action group belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    },
    '4.x': {
      actions: [{
        name: 'Action',
        type: 'Filament\\Actions\\Action',
        parameter: '$action',
        description: 'The current action instance.'
      }, {
        name: 'Arguments',
        type: 'array<string, mixed>',
        parameter: '$arguments',
        description: 'The array of arguments passed to the action when it was triggered.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: "The array of data submitted from form fields in the action's modal. It will be empty before the modal form is submitted."
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action, if one is attached.'
      }, {
        name: 'Selected Eloquent records',
        type: 'Illuminate\\Support\\Collection',
        parameter: '$selectedRecords',
        description: '[Bulk actions only] The Eloquent records selected in the table.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Actions in schemas only] The schema object that this action belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Actions in schemas only] The schema component that this action belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Actions in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema set function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Set',
        parameter: '$schemaSet',
        description: '[Actions in schemas only] A function for setting values in the schema data.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Actions in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Actions in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Actions in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Actions in tables only] The table object that this action belongs to.'
      }],
      actionGroups: [{
        name: 'Action group',
        type: 'Filament\\Actions\\ActionGroup',
        parameter: '$group',
        description: 'The current action group instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current action group, if one is attached.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current action group, if one is attached.'
      }, {
        name: 'Mounted actions',
        type: 'array<Filament\\Actions\\Action>',
        parameter: '$mountedActions',
        description: 'The array of actions that are currently mounted in the Livewire component. This is useful for accessing data from parent actions.'
      }, {
        name: 'Schema',
        type: 'Filament\\Schemas\\Schema',
        parameter: '$schema',
        description: '[Action groups in schemas only] The schema object that this action group belongs to.'
      }, {
        name: 'Schema component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$schemaComponent',
        description: '[Action groups in schemas only] The schema component that this action group belongs to.'
      }, {
        name: 'Schema get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$schemaGet',
        description: '[Action groups in schemas only] A function for retrieving values from the schema data. Validation is not run on form fields.'
      }, {
        name: 'Schema component state',
        type: 'mixed',
        parameter: '$schemaComponentState',
        description: '[Action groups in schemas only] The current value of the schema component.'
      }, {
        name: 'Schema operation',
        type: 'string',
        parameter: '$schemaOperation',
        description: '[Action groups in schemas only] The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Schema state',
        type: 'mixed',
        parameter: '$schemaState',
        description: '[Action groups in schemas only] The current value of the schema that this action belongs to, like the current repeater item.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: '[Action groups in tables only] The table object that this action group belongs to.'
      }],
      formFields: [{
        name: 'Field',
        type: 'Filament\\Forms\\Components\\Field',
        parameter: '$component',
        description: 'The current field component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current form data. Validation is not run.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Raw state',
        type: 'mixed',
        parameter: '$rawState',
        description: 'The current value of the field, before state casts were applied. Validation is not run.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the field. Validation is not run.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      exportColumns: [{
        name: 'Export column',
        type: 'Filament\\Actions\\Exports\\ExportColumn',
        parameter: '$column',
        description: 'The current export column instance.'
      }, {
        name: 'Exporter',
        type: '?Filament\\Actions\\Exports\\Exporter',
        parameter: '$exporter',
        description: 'The instance of the exporter class that is currently being used for exporting data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the export started.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being exported.'
      }],
      importColumns: [{
        name: 'Import column',
        type: 'Filament\\Actions\\Imports\\ImportColumn',
        parameter: '$column',
        description: 'The current import column instance.'
      }, {
        name: 'Data',
        type: 'array<string, mixed>',
        parameter: '$data',
        description: 'The processed data for the record that is currently being imported.'
      }, {
        name: 'Importer',
        type: '?Filament\\Actions\\Imports\\Importer',
        parameter: '$importer',
        description: 'The instance of the importer class that is currently being used for importing data.'
      }, {
        name: 'Options',
        type: 'array<string, mixed>',
        parameter: '$options',
        description: 'The options that were defined when the import started.'
      }, {
        name: 'Original data',
        type: 'array<string, mixed>',
        parameter: '$originalData',
        description: 'The original data for the record that is currently being imported, before it was processed.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record that is currently being imported.'
      }],
      infolistEntries: [{
        name: 'Entry',
        type: 'Filament\\Infolists\\Components\\Entry',
        parameter: '$component',
        description: 'The current entry component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the entry.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      schemaComponents: [{
        name: 'Component',
        type: 'Filament\\Schemas\\Components\\Component',
        parameter: '$component',
        description: 'The current component instance.'
      }, {
        name: 'Get function',
        type: 'Filament\\Schemas\\Components\\Utilities\\Get',
        parameter: '$get',
        description: 'A function for retrieving values from the current schema data. Validation is not run on form fields.'
      }, {
        name: 'Eloquent model FQN',
        type: '?string<Illuminate\\Database\\Eloquent\\Model>',
        parameter: '$model',
        description: 'The Eloquent model FQN for the current schema.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Operation',
        type: 'string',
        parameter: '$operation',
        description: 'The current operation being performed by the schema. Usually <code>create</code>, <code>edit</code>, or <code>view</code>.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current schema.'
      }],
      tableColumns: [{
        name: 'Column',
        type: 'Filament\\Tables\\Columns\\Column',
        parameter: '$column',
        description: 'The current column instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Row loop',
        type: 'stdClass',
        parameter: '$rowLoop',
        description: 'The <a href="https://laravel.com/docs/blade#the-loop-variable" target="_blank">row loop</a> object for the current table row.'
      }, {
        name: 'State',
        type: 'mixed',
        parameter: '$state',
        description: 'The current value of the column, based on the current table row.'
      }, {
        name: 'Eloquent record',
        type: '?Illuminate\\Database\\Eloquent\\Model',
        parameter: '$record',
        description: 'The Eloquent record for the current table row.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }],
      tableFilters: [{
        name: 'Filter',
        type: 'Filament\\Tables\\Filters\\BaseFilter',
        parameter: '$filter',
        description: 'The current filter instance.'
      }, {
        name: 'Livewire',
        type: 'Livewire\\Component',
        parameter: '$livewire',
        description: 'The Livewire component instance.'
      }, {
        name: 'Table',
        type: 'Filament\\Tables\\Table',
        parameter: '$table',
        description: 'The current table instance.'
      }]
    }
  };
  const baseUtilities = utilitySets[version]?.[set] || [];
  let utilities = [...parsedExtras, ...baseUtilities].sort((a, b) => a.parameter > b.parameter ? 1 : -1);
  utilities = Array.from(new Map(utilities.map(utility => [utility.parameter, utility])).values());
  const exceptList = (except ?? '').split('||');
  utilities = utilities.filter(utility => !exceptList.includes(utility.parameter));
  const links = {
    actions: `/${version}/actions/overview#action-utility-injection`,
    actionGroups: `/${version}/actions/overview#action-utility-injection`,
    formFields: `/${version}/forms/overview#field-utility-injection`,
    infolistEntries: `/${version}/infolists/overview#entry-utility-injection`,
    schemaComponents: `/${version}/schemas/overview#component-utility-injection`,
    tableColumns: `/${version}/tables/columns/overview#column-utility-injection`,
    tableFilters: `/${version}/tables/filters/overview#filter-utility-injection`
  };
  const link = links[set] ?? null;
  const parseInlineCode = text => {
    if (typeof text !== 'string') return text;
    const parts = text.split(/(`[^`]+`)/);
    return parts.map((part, i) => {
      if (part.startsWith('`') && part.endsWith('`')) {
        return <code key={i} className="rounded bg-gray-100 px-1 py-0.5 font-mono text-xs dark:bg-white/10">
            {part.slice(1, -1)}
          </code>;
      }
      return part;
    });
  };
  return <details className="border-standard mt-4 rounded-xl">
      <summary className="not-prose flex w-full cursor-pointer list-none flex-row content-center items-start rounded-t-xl rounded-b-xl px-3.5 py-3 text-sm text-gray-600 hover:bg-white/20 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-white/5 dark:hover:text-gray-200 [&::-webkit-details-marker]:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" className="mt-0.5 h-3.5 w-3.5 shrink-0 text-gray-400 transition-transform">
          <path d="m9 18 6-6-6-6" />
        </svg>

        <div className="ml-2 text-left leading-tight">
          {parseInlineCode(children)}
        </div>
      </summary>

      <div className="border-t border-gray-200 px-5 py-3 dark:border-white/10">
        {link && <p className="text-sm">
            <a href={link} target="_blank">
              Learn more about utility injection.
            </a>
          </p>}

        {utilities.map((utility, index) => <div key={index} className="border-b border-gray-200 py-3 last:border-b-0 dark:border-white/10">
            <div className="flex flex-wrap items-center gap-1.5 text-sm">
              <div>{utility.name}</div>
              <div className="text-primary dark:text-primary-light font-semibold">
                {utility.parameter}
              </div>
              <div className="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs text-gray-500 dark:bg-white/10 dark:text-gray-400">
                {utility.type}
              </div>
            </div>
            <div className="mt-1.5 text-sm text-gray-600 dark:text-gray-400" dangerouslySetInnerHTML={{
    __html: utility.description
  }} />
          </div>)}
      </div>
    </details>;
};

export const AutoScreenshot = ({name, alt, version}) => {
  const [loaded, setLoaded] = useState(false);
  return <div className="not-prose border-standard relative mt-4 min-h-10 rounded-2xl">
      <div className={`absolute inset-0 flex items-center px-3.5 py-3 transition-opacity ${loaded ? 'opacity-0' : 'opacity-100'}`}>
        <svg className="h-4 w-4 animate-spin text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
          <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
        </svg>
        <span className="ml-2 text-sm text-gray-600 dark:text-gray-300">
          Loading preview
        </span>
      </div>

      <img src={`/docs/images/${version}/light/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`rounded-2xl transition-opacity dark:hidden ${loaded ? 'opacity-100' : 'opacity-0'}`} />

      <img src={`/docs/images/${version}/dark/${name}.jpg`} alt={alt} loading="lazy" decoding="async" onLoad={() => setLoaded(true)} className={`hidden rounded-2xl transition-opacity dark:block ${loaded ? 'opacity-100' : 'opacity-0'}`} />
    </div>;
};

export const EditOnGitHub = ({version, path}) => {
  const url = `https://github.com/filamentphp/filament/edit/${version}/${path}`;
  return <div className="not-prose mt-16">
      <a href={url} target="_blank" rel="noopener noreferrer" className="inline-flex items-center gap-2 text-sm text-gray-500 transition hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="h-4 w-4">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z" />
        </svg>
        Edit this page on GitHub
      </a>
    </div>;
};

export const Footer = () => {
  const sponsorsByTier = JSON.parse(`{
  "agency_partner": [
    {
      "name": "Kirschbaum",
      "url": "https://kirschbaumdevelopment.com/solutions/filament-development",
      "filename": "kirschbaum.svg"
    }
  ],
  "gold": [
    {
      "name": "Agiledrop",
      "url": "https://www.agiledrop.com/laravel?utm_source=filament",
      "filename": "agiledrop.svg"
    },
    {
      "name": "Baiz.ai",
      "url": "https://baiz.ai",
      "filename": "baiz-ai.svg"
    },
    {
      "name": "CMS Max",
      "url": "https://cmsmax.com?ref=filamentphp.com",
      "filename": "cms-max.svg"
    },
    {
      "name": "Mailtrap",
      "url": "https://mailtrap.io/email-sending?utm_source=community&utm_medium=referral&utm_campaign=filament",
      "filename": "mailtrap.svg"
    },
    {
      "name": "SerpApi",
      "url": "https://serpapi.com/?utm_source=filamentphp",
      "filename": "serpapi.svg"
    }
  ]
}`);
  function shuffleArray(items) {
    const result = [...items];
    for (let index = result.length - 1; index > 0; index--) {
      const randomIndex = Math.floor(Math.random() * (index + 1));
      [result[index], result[randomIndex]] = [result[randomIndex], result[index]];
    }
    return result;
  }
  const sponsors = Object.entries(sponsorsByTier).flatMap(([, sponsors]) => shuffleArray(sponsors));
  return <div className="mt-16 flex flex-col gap-4">
      <h2 className="text-center text-2xl font-medium text-gray-800 dark:text-gray-200">
        Sponsored by
      </h2>

      <div className="not-prose flex flex-wrap items-center justify-center gap-5">
        {sponsors.map(sponsor => <a key={sponsor.name} className="footer-sponsor-card" href={sponsor.url} target="_blank" title={sponsor.name}>
            <img src={`/docs/images/sponsors/footer/${sponsor.filename}`} alt={sponsor.name} noZoom />
            <span className="line-pattern-overlay line-pattern-80" />
          </a>)}

        <a href="https://github.com/sponsors/danharrin" target="_blank" className="footer-sponsor-cta">
          <span className="sponsor-cta-content">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <path d="M5 12h14" />
              <path d="M12 5v14" />
            </svg>
            <span>Your logo here</span>
          </span>
          <span className="line-pattern-overlay line-pattern-60" />
        </a>
      </div>
    </div>;
};

## Choosing the right tool for the job

Filament provides many ways to manage relationships in the app. Which feature you should use depends on the type of relationship you are managing, and which UI you are looking for.

### Relation managers - interactive tables underneath your resource forms

<Info>
  These are compatible with `HasMany`, `HasManyThrough`, `BelongsToMany`, `MorphMany` and `MorphToMany` relationships.
</Info>

[Relation managers](#creating-a-relation-manager) are interactive tables that allow administrators to list, create, attach, associate, edit, detach, dissociate and delete related records without leaving the resource's Edit or View page.

### Select & checkbox list - choose from existing records or create a new one

<Info>
  These are compatible with `BelongsTo`, `MorphTo` and `BelongsToMany` relationships.
</Info>

Using a [select](../forms/select#integrating-with-an-eloquent-relationship), users will be able to choose from a list of existing records. You may also [add a button that allows you to create a new record inside a modal](../forms/select#creating-new-records), without leaving the page.

When using a `BelongsToMany` relationship with a select, you'll be able to select multiple options, not just one. Records will be automatically added to your pivot table when you submit the form. If you wish, you can swap out the multi-select dropdown with a simple [checkbox list](../forms/checkbox-list#integrating-with-an-eloquent-relationship). Both components work in the same way.

### Repeaters - CRUD multiple related records inside the owner's form

<Info>
  These are compatible with `HasMany` and `MorphMany` relationships.
</Info>

[Repeaters](../forms/repeater#integrating-with-an-eloquent-relationship) are standard form components, which can render a repeatable set of fields infinitely. They can be hooked up to a relationship, so records are automatically read, created, updated, and deleted from the related table. They live inside the main form schema, and can be used inside resource pages, as well as nesting within action modals.

From a UX perspective, this solution is only suitable if your related model only has a few fields. Otherwise, the form can get very long.

### Layout form components - saving form fields to a single relationship

<Info>
  These are compatible with `BelongsTo`, `HasOne` and `MorphOne` relationships.
</Info>

All layout form components ([Grid](../schemas/layouts#grid-component), [Section](../schemas/sections), [Fieldset](../schemas/layouts#fieldset-component), etc.) have a [`relationship()` method](../forms/overview#saving-data-to-relationships). When you use this, all fields within that layout are saved to the related model instead of the owner's model:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;

Fieldset::make('Metadata')
    ->relationship('metadata')
    ->schema([
        TextInput::make('title'),
        Textarea::make('description'),
        FileUpload::make('image'),
    ])
```

In this example, the `title`, `description` and `image` are automatically loaded from the `metadata` relationship, and saved again when the form is submitted. If the `metadata` record does not exist, it is automatically created.

This feature is explained more in depth in the [Forms documentation](../forms/overview#saving-data-to-relationships). Please visit that page for more information about how to use it.

## Creating a relation manager

To create a relation manager, you can use the `make:filament-relation-manager` command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-relation-manager CategoryResource posts title
```

* `CategoryResource` is the name of the resource class for the owner (parent) model.
* `posts` is the name of the relationship you want to manage.
* `title` is the name of the attribute that will be used to identify posts.

This will create a `CategoryResource/RelationManagers/PostsRelationManager.php` file. This contains a class where you are able to define a [form](./overview#resource-forms) and [table](./overview#resource-tables) for your relation manager:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            Forms\Components\TextInput::make('title')->required(),
            // ...
        ]);
}

public function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title'),
            // ...
        ]);
}
```

You must register the new relation manager in your resource's `getRelations()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getRelations(): array
{
    return [
        RelationManagers\PostsRelationManager::class,
    ];
}
```

Once a table and form have been defined for the relation manager, visit the [Edit](./editing-records) or [View](./viewing-records) page of your resource to see it in action.

<AutoScreenshot name="panels/resources/relation-manager" alt="Relation manager" version="5.x" />

### Customizing the relation manager's URL parameter

If you pass a key to the array returned from `getRelations()`, it will be used in the URL for that relation manager when switching between multiple relation managers. For example, you can pass `posts` to use `?relation=posts` in the URL instead of a numeric array index:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getRelations(): array
{
    return [
        'posts' => RelationManagers\PostsRelationManager::class,
    ];
}
```

### Read-only mode

Relation managers are usually displayed on either the Edit or View page of a resource. On the View page, Filament will automatically hide all actions that modify the relationship, such as create, edit, and delete. We call this "read-only mode", and it is there by default to preserve the read-only behavior of the View page. However, you can disable this behavior, by overriding the `isReadOnly()` method on the relation manager class to return `false` all the time:

```php theme={"theme":"gruvbox-dark-hard"}
public function isReadOnly(): bool
{
    return false;
}
```

Alternatively, if you hate this functionality, you can disable it for all relation managers at once in the panel [configuration](../panel-configuration):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->readOnlyRelationManagersOnResourceViewPagesByDefault(false);
}
```

### Unconventional inverse relationship names

For inverse relationships that do not follow Laravel's naming guidelines, you may wish to use the `inverseRelationship()` method on the table:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('title'),
            // ...
        ])
        ->inverseRelationship('section'); // Since the inverse related model is `Category`, this is normally `category`, not `section`.
}
```

### Handling soft-deletes

By default, you will not be able to interact with deleted records in the relation manager. If you'd like to add functionality to restore, force-delete and filter trashed records in your relation manager, use the `--soft-deletes` flag when generating the relation manager:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-relation-manager CategoryResource posts title --soft-deletes
```

You can find out more about soft-deleting [here](#deleting-records).

## Listing related records

Related records will be listed in a table. The entire relation manager is based around this table, which contains actions to [create](#creating-related-records), [edit](#editing-related-records), [attach / detach](#attaching-and-detaching-records), [associate / dissociate](#associating-and-dissociating-records), and delete records.

You may use any features of the [Table Builder](../tables) to customize relation managers.

### Listing with pivot attributes

For `BelongsToMany` and `MorphToMany` relationships, you may also add pivot table attributes. For example, if you have a `TeamsRelationManager` for your `UserResource`, and you want to add the `role` pivot attribute to the table, you can use:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables;

public function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('role'),
        ]);
}
```

Please ensure that any pivot attributes are listed in the `withPivot()` method of the relationship *and* inverse relationship.

## Creating related records

### Creating with pivot attributes

For `BelongsToMany` and `MorphToMany` relationships, you may also add pivot table attributes. For example, if you have a `TeamsRelationManager` for your `UserResource`, and you want to add the `role` pivot attribute to the create form, you can use:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms;
use Filament\Schemas\Schema;

public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('role')->required(),
            // ...
        ]);
}
```

Please ensure that any pivot attributes are listed in the `withPivot()` method of the relationship *and* inverse relationship.

### Customizing the `CreateAction`

To learn how to customize the `CreateAction`, including mutating the form data, changing the notification, and adding lifecycle hooks, please see the [Actions documentation](../actions/create).

## Editing related records

### Editing with pivot attributes

For `BelongsToMany` and `MorphToMany` relationships, you may also edit pivot table attributes. For example, if you have a `TeamsRelationManager` for your `UserResource`, and you want to add the `role` pivot attribute to the edit form, you can use:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms;
use Filament\Schemas\Schema;

public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('role')->required(),
            // ...
        ]);
}
```

Please ensure that any pivot attributes are listed in the `withPivot()` method of the relationship *and* inverse relationship.

### Customizing the `EditAction`

To learn how to customize the `EditAction`, including mutating the form data, changing the notification, and adding lifecycle hooks, please see the [Actions documentation](../actions/edit).

## Attaching and detaching records

Filament is able to attach and detach records for `BelongsToMany` and `MorphToMany` relationships.

When generating your relation manager, you may pass the `--attach` flag to also add `AttachAction`, `DetachAction` and `DetachBulkAction` to the table:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-relation-manager CategoryResource posts title --attach
```

Alternatively, if you've already generated your resource, you can just add the actions to the `$table` arrays:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->headerActions([
            // ...
            AttachAction::make(),
        ])
        ->recordActions([
            // ...
            DetachAction::make(),
        ])
        ->toolbarActions([
            BulkActionGroup::make([
                // ...
                DetachBulkAction::make(),
            ]),
        ]);
}
```

<AutoScreenshot name="panels/resources/relation-manager-attach" alt="Relation manager attach modal" version="5.x" />

### Preloading the attachment modal select options

By default, as you search for a record to attach, options will load from the database via AJAX. If you wish to preload these options when the form is first loaded instead, you can use the `preloadRecordSelect()` method of `AttachAction`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AttachAction;

AttachAction::make()
    ->preloadRecordSelect()
```

### Attaching with pivot attributes

When you attach record with the `Attach` button, you may wish to define a custom form to add pivot attributes to the relationship:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AttachAction;
use Filament\Forms;

AttachAction::make()
    ->schema(fn (AttachAction $action): array => [
        $action->getRecordSelect(),
        Forms\Components\TextInput::make('role')->required(),
    ])
```

In this example, `$action->getRecordSelect()` returns the select field to pick the record to attach. The `role` text input is then saved to the pivot table's `role` column.

Please ensure that any pivot attributes are listed in the `withPivot()` method of the relationship *and* inverse relationship.

### Scoping the options to attach

You may want to scope the options available to `AttachAction`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AttachAction;
use Illuminate\Database\Eloquent\Builder;

AttachAction::make()
    ->recordSelectOptionsQuery(fn (Builder $query) => $query->whereBelongsTo(auth()->user()))
```

### Searching the options to attach across multiple columns

By default, the options available to `AttachAction` will be searched in the `recordTitleAttribute()` of the table. If you wish to search across multiple columns, you can use the `recordSelectSearchColumns()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AttachAction;

AttachAction::make()
    ->recordSelectSearchColumns(['title', 'description'])
```

### Attaching multiple records

The `multiple()` method on the `AttachAction` component allows you to select multiple values:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AttachAction;

AttachAction::make()
    ->multiple()
```

### Customizing the select field in the attached modal

You may customize the select field object that is used during attachment by passing a function to the `recordSelect()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AttachAction;
use Filament\Forms\Components\Select;

AttachAction::make()
    ->recordSelect(
        fn (Select $select) => $select->placeholder('Select a post'),
    )
```

#### Selecting records to attach using a modal table

You may use the `tableSelect()` method to select records in the attachment modal using a full Filament table, instead of a simple select dropdown:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Products\Tables\ProductsTable;
use Filament\Actions\AttachAction;

AttachAction::make()
    ->tableSelect(ProductsTable::class)
```

In this example, the `ProductsTable` class is a standard Filament table class, with a `configure()` method that defines the table's columns:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

public static function configure(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name'),
            TextColumn::make('sku'),
            // ...
        ])
        ->filters([
            // ...
        ]);
}
```

### Handling duplicates

By default, you will not be allowed to attach a record more than once. This is because you must also set up a primary `id` column on the pivot table for this feature to work.

Please ensure that the `id` attribute is listed in the `withPivot()` method of the relationship *and* inverse relationship.

Finally, add the `allowDuplicates()` method to the table:

```php theme={"theme":"gruvbox-dark-hard"}
public function table(Table $table): Table
{
    return $table
        ->allowDuplicates();
}
```

### Improving the performance of detach bulk actions

By default, the `DetachBulkAction` will load all Eloquent records into memory, before looping over them and detaching them one by one.

If you are detaching a large number of records, you may want to use the `chunkSelectedRecords()` method to fetch a smaller number of records at a time. This will reduce the memory usage of your application:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\DetachBulkAction;

DetachBulkAction::make()
    ->chunkSelectedRecords(250)
```

Filament loads Eloquent records into memory before detaching them for two reasons:

* To allow individual records in the collection to be authorized with a model policy before detaching (using `authorizeIndividualRecords('delete')`, for example).
* To ensure that model events are run when detaching records, such as the `deleting` and `deleted` events in a model observer.

If you do not require individual record policy authorization and model events, you can use the `fetchSelectedRecords(false)` method, which will not fetch the records into memory before detaching them, and instead will detach them in a single query:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\DetachBulkAction;

DetachBulkAction::make()
    ->fetchSelectedRecords(false)
```

## Associating and dissociating records

Filament is able to associate and dissociate records for `HasMany` and `MorphMany` relationships.

When generating your relation manager, you may pass the `--associate` flag to also add `AssociateAction`, `DissociateAction` and `DissociateBulkAction` to the table:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-relation-manager CategoryResource posts title --associate
```

Alternatively, if you've already generated your resource, you can just add the actions to the `$table` arrays:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->headerActions([
            // ...
            AssociateAction::make(),
        ])
        ->recordActions([
            // ...
            DissociateAction::make(),
        ])
        ->toolbarActions([
            BulkActionGroup::make([
                // ...
                DissociateBulkAction::make(),
            ]),
        ]);
}
```

### Preloading the associate modal select options

By default, as you search for a record to associate, options will load from the database via AJAX. If you wish to preload these options when the form is first loaded instead, you can use the `preloadRecordSelect()` method of `AssociateAction`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AssociateAction;

AssociateAction::make()
    ->preloadRecordSelect()
```

### Scoping the options to associate

You may want to scope the options available to `AssociateAction`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AssociateAction;
use Illuminate\Database\Eloquent\Builder;

AssociateAction::make()
    ->recordSelectOptionsQuery(fn (Builder $query) => $query->whereBelongsTo(auth()->user()))
```

### Searching the options to associate across multiple columns

By default, the options available to `AssociateAction` will be searched in the `recordTitleAttribute()` of the table. If you wish to search across multiple columns, you can use the `recordSelectSearchColumns()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AssociateAction;

AssociateAction::make()
    ->recordSelectSearchColumns(['title', 'description'])
```

### Associating multiple records

The `multiple()` method on the `AssociateAction` component allows you to select multiple values:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AssociateAction;

AssociateAction::make()
    ->multiple()
```

### Customizing the select field in the associate modal

You may customize the select field object that is used during association by passing a function to the `recordSelect()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AssociateAction;
use Filament\Forms\Components\Select;

AssociateAction::make()
    ->recordSelect(
        fn (Select $select) => $select->placeholder('Select a post'),
    )
```

### Improving the performance of dissociate bulk actions

By default, the `DissociateBulkAction` will load all Eloquent records into memory, before looping over them and dissociating them one by one.

If you are dissociating a large number of records, you may want to use the `chunkSelectedRecords()` method to fetch a smaller number of records at a time. This will reduce the memory usage of your application:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\DissociateBulkAction;

DissociateBulkAction::make()
    ->chunkSelectedRecords(250)
```

Filament loads Eloquent records into memory before dissociating them for two reasons:

* To allow individual records in the collection to be authorized with a model policy before dissociation (using `authorizeIndividualRecords('update')`, for example).
* To ensure that model events are run when dissociating records, such as the `updating` and `updated` events in a model observer.

If you do not require individual record policy authorization and model events, you can use the `fetchSelectedRecords(false)` method, which will not fetch the records into memory before dissociating them, and instead will dissociate them in a single query:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\DissociateBulkAction;

DissociateBulkAction::make()
    ->fetchSelectedRecords(false)
```

## Viewing related records

When generating your relation manager, you may pass the `--view` flag to also add a `ViewAction` to the table:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-relation-manager CategoryResource posts title --view
```

Alternatively, if you've already generated your relation manager, you can just add the `ViewAction` to the `$table->recordActions()` array:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->columns([
            // ...
        ])
        ->recordActions([
            ViewAction::make(),
            // ...
        ]);
}
```

## Deleting related records

By default, you will not be able to interact with deleted records in the relation manager. If you'd like to add functionality to restore, force-delete and filter trashed records in your relation manager, use the `--soft-deletes` flag when generating the relation manager:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-relation-manager CategoryResource posts title --soft-deletes
```

Alternatively, you may add soft-deleting functionality to an existing relation manager:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

public function table(Table $table): Table
{
    return $table
        ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]))
        ->columns([
            // ...
        ])
        ->filters([
            TrashedFilter::make(),
            // ...
        ])
        ->recordActions([
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
            // ...
        ])
        ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
                // ...
            ]),
        ]);
}
```

### Customizing the `DeleteAction`

To learn how to customize the `DeleteAction`, including changing the notification and adding lifecycle hooks, please see the [Actions documentation](../actions/delete).

## Importing related records

The [`ImportAction`](../actions/import) can be added to the header of a relation manager to import records. In this case, you probably want to tell the importer which owner these new records belong to. You can use [import options](../actions/import#using-import-options) to pass through the ID of the owner record:

```php theme={"theme":"gruvbox-dark-hard"}
ImportAction::make()
    ->importer(ProductImporter::class)
    ->options(['categoryId' => $this->getOwnerRecord()->getKey()])
```

Now, in the importer class, you can associate the owner in a one-to-many relationship with the imported record:

```php theme={"theme":"gruvbox-dark-hard"}
public function resolveRecord(): ?Product
{
    $product = Product::firstOrNew([
        'sku' => $this->data['sku'],
    ]);
    
    $product->category()->associate($this->options['categoryId']);
    
    return $product;
}
```

Alternatively, you can attach the record in a many-to-many relationship using the `afterSave()` hook of the importer:

```php theme={"theme":"gruvbox-dark-hard"}
protected function afterSave(): void
{
    $this->record->categories()->syncWithoutDetaching([$this->options['categoryId']]);
}
```

## Accessing the relationship's owner record

Relation managers are Livewire components. When they are first loaded, the owner record (the Eloquent record which serves as a parent - the main resource model) is saved into a property. You can read this property using:

```php theme={"theme":"gruvbox-dark-hard"}
$this->getOwnerRecord()
```

However, if you're inside a `static` method like `form()` or `table()`, `$this` isn't accessible. So, you may [use a callback](../forms/overview#field-utility-injection) to access the `$livewire` instance:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;

public function form(Schema $schema): Schema
{
    return $schema
        ->components([
            Forms\Components\Select::make('store_id')
                ->options(function (RelationManager $livewire): array {
                    return $livewire->getOwnerRecord()->stores()
                        ->pluck('name', 'id')
                        ->toArray();
                }),
            // ...
        ]);
}
```

All methods in Filament accept a callback which you can access `$livewire->ownerRecord` in.

## Grouping relation managers

You may choose to group relation managers together into one tab. To do this, you may wrap multiple managers in a `RelationGroup` object, with a label:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\RelationManagers\RelationGroup;

public static function getRelations(): array
{
    return [
        RelationGroup::make('Interactions', [
            RelationManagers\CommentsRelationManager::class,
            RelationManagers\TagsRelationManager::class,
        ]),
        RelationGroup::make('Links', [
            RelationManagers\LinksRelationManager::class,
        ]),
    ];
}
```

<AutoScreenshot name="panels/resources/relation-manager-grouped" alt="Relation managers with grouped tabs" version="5.x" />

## Conditionally showing relation managers

By default, relation managers will be visible if the `viewAny()` method for the related model policy returns `true`.

You may use the `canViewForRecord()` method to determine if the relation manager should be visible for a specific owner record and page:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Model;

public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool
{
    return $ownerRecord->status === Status::Draft;
}
```

## Combining the relation manager tabs with the form

On the Edit or View page class, override the `hasCombinedRelationManagerTabsWithContent()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public function hasCombinedRelationManagerTabsWithContent(): bool
{
    return true;
}
```

<AutoScreenshot name="panels/resources/editing-combined-tabs" alt="Resource edit page with combined relation manager tabs" version="5.x" />

### Customizing the content tab

On the Edit or View page class, override the `getContentTabComponent()` method, and use any [Tab](../schemas/tabs) customization methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;

public function getContentTabComponent(): Tab
{
    return Tab::make('Settings')
        ->icon('heroicon-m-cog');
}
```

### Setting the position of the form tab

By default, the form tab is rendered before the relation tabs. To render it after, you can override the `getContentTabPosition()` method on the Edit or View page class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\Pages\Enums\ContentTabPosition;

public function getContentTabPosition(): ?ContentTabPosition
{
    return ContentTabPosition::After;
}
```

## Customizing relation manager tabs

To customize the tab for a relation manager, override the `getTabComponent()` method, and use any [Tab](../schemas/tabs) customization methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;

public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
{
    return Tab::make('Blog posts')
        ->badge($ownerRecord->posts()->count())
        ->badgeColor('info')
        ->badgeTooltip('The number of posts in this category')
        ->icon('heroicon-m-document-text');
}
```

<UtilityInjection set="schemaComponents" version="5.x" extras="Badge;;?string;;$badge;;The evaluated value of the badge.">As well as allowing static values, the `badgeColor()` and `badgeTooltip()` methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

If you are using a [relation group](#grouping-relation-managers), you can use the `tab()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\RelationManagers\RelationGroup;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;

RelationGroup::make('Contacts', [
    // ...
])
    ->tab(fn (Model $ownerRecord): Tab => Tab::make('Blog posts')
        ->badge($ownerRecord->posts()->count())
        ->badgeColor('info')
        ->badgeTooltip('The number of posts in this category')
        ->icon('heroicon-m-document-text'));
```

<UtilityInjection set="schemaComponents" version="5.x" extras="Badge;;?string;;$badge;;The evaluated value of the badge.">As well as allowing static values, the `badgeColor()` and `badgeTooltip()` methods also accept functions to dynamically calculate them. You can inject various utilities into the functions as parameters.</UtilityInjection>

### Deferring the loading of relation manager tab badges

If `getBadge()` runs an expensive query, you may defer the badge so that it loads asynchronously after the page renders, by setting the `$isBadgeDeferred` property to `true`:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Model;

protected static bool $isBadgeDeferred = true;

public static function getBadge(Model $ownerRecord, string $pageClass): ?string
{
    $count = $ownerRecord->tickets()->count();

    return $count > 0 ? (string) $count : null;
}
```

Alternatively, you may override the `isBadgeDeferred()` method to define dynamic behavior:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Model;

public static function isBadgeDeferred(Model $ownerRecord, string $pageClass): bool
{
    return FeatureFlag::active();
}
```

If you are using a [relation group](#grouping-relation-managers), use the fluent `deferBadge()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\RelationManagers\RelationGroup;

RelationGroup::make('Contacts', [
    // ...
])
    ->badge(fn (Model $ownerRecord): string => (string) $ownerRecord->contacts()->count())
    ->deferBadge();
```

## Sharing a resource's form and table with a relation manager

You may decide that you want a resource's form and table to be identical to a relation manager's, and subsequently want to reuse the code you previously wrote. This is easy, by calling the `form()` and `table()` methods of the resource from the relation manager:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Blog\Posts\PostResource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

public function form(Schema $schema): Schema
{
    return PostResource::form($schema);
}

public function table(Table $table): Table
{
    return PostResource::table($table);
}
```

### Hiding a shared form component on the relation manager

If you're sharing a form component from the resource with the relation manager, you may want to hide it on the relation manager. This is especially useful if you want to hide a `Select` field for the owner record in the relation manager, since Filament will handle this for you anyway. To do this, you may use the `hiddenOn()` method, passing the name of the relation manager:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Blog\Posts\PostResource\RelationManagers\CommentsRelationManager;
use Filament\Forms\Components\Select;

Select::make('post_id')
    ->relationship('post', 'title')
    ->hiddenOn(CommentsRelationManager::class)
```

### Hiding a shared table column on the relation manager

If you're sharing a table column from the resource with the relation manager, you may want to hide it on the relation manager. This is especially useful if you want to hide a column for the owner record in the relation manager, since this is not appropriate when the owner record is already listed above the relation manager. To do this, you may use the `hiddenOn()` method, passing the name of the relation manager:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Blog\Posts\PostResource\RelationManagers\CommentsRelationManager;
use Filament\Tables\Columns\TextColumn;

TextColumn::make('post.title')
    ->hiddenOn(CommentsRelationManager::class)
```

### Hiding a shared table filter on the relation manager

If you're sharing a table filter from the resource with the relation manager, you may want to hide it on the relation manager. This is especially useful if you want to hide a filter for the owner record in the relation manager, since this is not appropriate when the table is already filtered by the owner record. To do this, you may use the `hiddenOn()` method, passing the name of the relation manager:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Blog\Posts\PostResource\RelationManagers\CommentsRelationManager;
use Filament\Tables\Filters\SelectFilter;

SelectFilter::make('post')
    ->relationship('post', 'title')
    ->hiddenOn(CommentsRelationManager::class)
```

### Overriding shared configuration on the relation manager

Any configuration that you make inside the resource can be overwritten on the relation manager. For example, if you wanted to disable pagination on the relation manager's inherited table but not the resource itself:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Blog\Posts\PostResource;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return PostResource::table($table)
        ->paginated(false);
}
```

It is probably also useful to provide extra configuration on the relation manager if you wanted to add a header action to [create](#creating-related-records), [attach](#attaching-and-detaching-records), or [associate](#associating-and-dissociating-records) records in the relation manager:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Blog\Posts\PostResource;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return PostResource::table($table)
        ->headerActions([
            CreateAction::make(),
            AttachAction::make(),
        ]);
}
```

## Customizing the relation manager Eloquent query

You can apply your own query constraints or [model scopes](https://laravel.com/docs/eloquent#query-scopes) that affect the entire relation manager. To do this, you can pass a function to the `modifyQueryUsing()` method of the table, inside which you can customize the query:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

public function table(Table $table): Table
{
    return $table
        ->modifyQueryUsing(fn (Builder $query) => $query->where('is_active', true))
        ->columns([
            // ...
        ]);
}
```

## Customizing the relation manager title

To set the title of the relation manager, you can use the `$title` property on the relation manager class:

```php theme={"theme":"gruvbox-dark-hard"}
protected static ?string $title = 'Posts';
```

To set the title of the relation manager dynamically, you can override the `getTitle()` method on the relation manager class:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Database\Eloquent\Model;

public static function getTitle(Model $ownerRecord, string $pageClass): string
{
    return __('relation-managers.posts.title');
}
```

The title will be reflected in the [heading of the table](../tables/overview#customizing-the-table-header), as well as the relation manager tab if there is more than one. If you want to customize the table heading independently, you can still use the `$table->heading()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Tables;

public function table(Table $table): Table
{
    return $table
        ->heading('Posts')
        ->columns([
            // ...
        ]);
}
```

## Customizing the relation manager record title

The relation manager uses the concept of a "record title attribute" to determine which attribute of the related model should be used to identify it. When creating a relation manager, this attribute is passed as the third argument to the `make:filament-relation-manager` command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-relation-manager CategoryResource posts title
```

In this example, the `title` attribute of the `Post` model will be used to identify a post in the relation manager.

This is mainly used by the action classes. For instance, when you [attach](#attaching-and-detaching-records) or [associate](#associating-and-dissociating-records) a record, the titles will be listed in the select field. When you [edit](#editing-related-records), [view](#viewing-related-records) or [delete](#deleting-related-records) a record, the title will be used in the header of the modal.

In some cases, you may want to concatenate multiple attributes together to form a title. You can do this by replacing the `recordTitleAttribute()` configuration method with `recordTitle()`, passing a function that transforms a model into a title:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Models\Post;
use Filament\Tables\Table;

public function table(Table $table): Table
{
    return $table
        ->recordTitle(fn (Post $record): string => "{$record->title} ({$record->id})")
        ->columns([
            // ...
        ]);
}
```

If you're using `recordTitle()`, and you have an [associate action](#associating-and-dissociating-records) or [attach action](#attaching-and-detaching-records), you will also want to specify search columns for those actions:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\AssociateAction;
use Filament\Actions\AttachAction;

AssociateAction::make()
    ->recordSelectSearchColumns(['title', 'id']);

AttachAction::make()
    ->recordSelectSearchColumns(['title', 'id'])
```

## Relation pages

Using a `ManageRelatedRecords` page is an alternative to using a relation manager, if you want to keep the functionality of managing a relationship separate from editing or viewing the owner record.

This feature is ideal if you are using [resource sub-navigation](./overview#resource-sub-navigation), as you are easily able to switch between the View or Edit page and the relation page.

To create a relation page, you should use the `make:filament-page` command:

```bash theme={"theme":"gruvbox-dark-hard"}
php artisan make:filament-page ManageCustomerAddresses --resource=CustomerResource --type=ManageRelatedRecords
```

When you run this command, you will be asked a series of questions to customize the page, for example, the name of the relationship and its title attribute.

You must register this new page in your resource's `getPages()` method:

```php theme={"theme":"gruvbox-dark-hard"}
public static function getPages(): array
{
    return [
        'index' => Pages\ListCustomers::route('/'),
        'create' => Pages\CreateCustomer::route('/create'),
        'view' => Pages\ViewCustomer::route('/{record}'),
        'edit' => Pages\EditCustomer::route('/{record}/edit'),
        'addresses' => Pages\ManageCustomerAddresses::route('/{record}/addresses'),
    ];
}
```

<Warning>
  When using a relation page, you do not need to generate a relation manager with `make:filament-relation-manager`, and you do not need to register it in the `getRelations()` method of the resource.
</Warning>

Now, you can customize the page in exactly the same way as a relation manager, with the same `table()` and `form()`.

### Adding relation pages to resource sub-navigation

If you're using [resource sub-navigation](./overview#resource-sub-navigation), you can register this page as normal in `getRecordSubNavigation()` of the resource:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Customers\Pages;
use Filament\Resources\Pages\Page;

public static function getRecordSubNavigation(Page $page): array
{
    return $page->generateNavigationItems([
        // ...
        Pages\ManageCustomerAddresses::class,
    ]);
}
```

## Passing properties to relation managers

When registering a relation manager in a resource, you can use the `make()` method to pass an array of [Livewire properties](https://livewire.laravel.com/docs/properties) to it:

```php theme={"theme":"gruvbox-dark-hard"}
use App\Filament\Resources\Blog\Posts\PostResource\RelationManagers\CommentsRelationManager;

public static function getRelations(): array
{
    return [
        CommentsRelationManager::make([
            'status' => 'approved',
        ]),
    ];
}
```

This array of properties gets mapped to [public Livewire properties](https://livewire.laravel.com/docs/properties) on the relation manager class:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Resources\RelationManagers\RelationManager;

class CommentsRelationManager extends RelationManager
{
    public string $status;

    // ...
}
```

Now, you can access the `status` in the relation manager class using `$this->status`.

## Disabling lazy loading

By default, relation managers are lazy-loaded. This means that they will only be loaded when they are visible on the page.

To disable this behavior, you may override the `$isLazy` property on the relation manager class:

```php theme={"theme":"gruvbox-dark-hard"}
protected static bool $isLazy = false;
```

<EditOnGitHub version="5.x" path="docs/03-resources/07-managing-relationships.md" />

<Footer />
