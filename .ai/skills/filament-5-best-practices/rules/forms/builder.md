> ## Documentation Index
> Fetch the complete documentation index at: https://filamentphp.com/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Builder

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

## Introduction

Similar to a [repeater](./repeater), the builder component allows you to output a JSON array of repeated form components. Unlike the repeater, which only defines one form schema to repeat, the builder allows you to define different schema "blocks", which you can repeat in any order. This makes it useful for building more advanced array structures.

The primary use of the builder component is to build web page content using predefined blocks. This could be content for a marketing website, or maybe even fields in an online form. The example below defines multiple blocks for different elements in the page content. On the frontend of your website, you could loop through each block in the JSON and format it how you wish.

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

Builder::make('content')
    ->blocks([
        Block::make('heading')
            ->schema([
                TextInput::make('content')
                    ->label('Heading')
                    ->required(),
                Select::make('level')
                    ->options([
                        'h1' => 'Heading 1',
                        'h2' => 'Heading 2',
                        'h3' => 'Heading 3',
                        'h4' => 'Heading 4',
                        'h5' => 'Heading 5',
                        'h6' => 'Heading 6',
                    ])
                    ->required(),
            ])
            ->columns(2),
        Block::make('paragraph')
            ->schema([
                Textarea::make('content')
                    ->label('Paragraph')
                    ->required(),
            ]),
        Block::make('image')
            ->schema([
                FileUpload::make('url')
                    ->label('Image')
                    ->image()
                    ->required(),
                TextInput::make('alt')
                    ->label('Alt text')
                    ->required(),
            ]),
    ])
```

<AutoScreenshot name="forms/fields/builder/simple" alt="Builder" version="5.x" />

We recommend that you store builder data with a `JSON` column in your database. Additionally, if you're using Eloquent, make sure that column has an `array` cast.

As evident in the above example, blocks can be defined within the `blocks()` method of the component. Blocks are `Builder\Block` objects, and require a unique name, and a component schema:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

Builder::make('content')
    ->blocks([
        Block::make('heading')
            ->schema([
                TextInput::make('content')->required(),
                // ...
            ]),
        // ...
    ])
```

## Setting a block's label

By default, the label of the block will be automatically determined based on its name. To override the block's label, you may use the `label()` method. Customizing the label in this way is useful if you wish to use a [translation string for localization](https://laravel.com/docs/localization#retrieving-translation-strings):

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder\Block;

Block::make('heading')
    ->label(__('blocks.heading'))
```

### Labelling builder items based on their content

You may add a label for a builder item using the same `label()` method. This method accepts a closure that receives the item's data in a `$state` variable. If `$state` is null, you should return the block label that should be displayed in the block picker. Otherwise, you should return a string to be used as the item label:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

Block::make('heading')
    ->schema([
        TextInput::make('content')
            ->live(onBlur: true)
            ->required(),
        // ...
    ])
    ->label(function (?array $state): string {
        if ($state === null) {
            return 'Heading';
        }

        return $state['content'] ?? 'Untitled heading';
    })
```

Any fields that you use from `$state` should be `live()` if you wish to see the item label update live as you use the form.

<UtilityInjection set="formFields" version="5.x" extras="Key;;string;;$key;;The key for the current block.||Index;;int;;$index;;The zero-based index of the current block.||State;;array<string, mixed>;;$state;;The raw unvalidated data for the current block.">You can inject various utilities into the function passed to `label()` as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/builder/labelled" alt="Builder with labelled blocks based on the content" version="5.x" />

### Numbering builder items

By default, items in the builder have a number next to their label. You may disable this using the `blockNumbers(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->blockNumbers(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `blockNumbers()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Setting a block's icon

Blocks may also have an [icon](../styling/icons), which is displayed next to the label. You can add an icon by passing its name to the `icon()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder\Block;
use Filament\Support\Icons\Heroicon;

Block::make('paragraph')
    ->icon(Heroicon::Bars3BottomLeft)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `icon()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/builder/icons" alt="Builder with block icons in the dropdown" version="5.x" />

### Adding icons to the header of blocks

By default, blocks in the builder don't have an icon next to the header label, just in the dropdown to add new blocks. You may enable this using the `blockIcons()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->blockIcons()
```

Optionally, you may pass a boolean value to the `blockIcons()` method to control if the icons are displayed in the block headers:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->blockIcons(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `blockIcons()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/builder/block-icons" alt="Builder with icons in block headers" version="5.x" />

## Previewing blocks

If you prefer to render read-only previews in the builder instead of the blocks' forms, you can use the `blockPreviews()` method. This will render each block's `preview()` instead of the form. Block data will be passed to the preview Blade view in a variable with the same name:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

Builder::make('content')
    ->blockPreviews()
    ->blocks([
        Block::make('heading')
            ->schema([
                TextInput::make('text')
                    ->placeholder('Default heading'),
            ])
            ->preview('filament.content.block-previews.heading'),
    ])
```

In `/resources/views/filament/content/block-previews/heading.blade.php`, you can access the block data like so:

```blade theme={"theme":"gruvbox-dark-hard"}
<h1>
    {{ $text ?? 'Default heading' }}
</h1>
```

Optionally, the `blockPreviews()` method accepts a boolean value to control if the builder should render block previews or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->blockPreviews(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `blockPreviews()` and `preview()` methods also accept functions to dynamically calculate them. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/builder/block-previews" alt="Builder with block previews" version="5.x" />

### Interactive block previews

By default, preview content is not interactive, and clicking it will open the Edit modal for that block to manage its settings. If you have links and buttons that you'd like to remain interactive in the block previews, you can use the `areInteractive: true` argument of the `blockPreviews()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blockPreviews(areInteractive: true)
    ->blocks([
        //
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `areInteractive` argument also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Adding items

An action button is displayed below the builder to allow the user to add a new item.

## Setting the add action button's label

You may set a label to customize the text that should be displayed in the button for adding a builder item, using the `addActionLabel()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->addActionLabel('Add a new block')
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `addActionLabel()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Aligning the add action button

By default, the add action is aligned in the center. You may adjust this using the `addActionAlignment()` method, passing an `Alignment` option of `Alignment::Start` or `Alignment::End`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;
use Filament\Support\Enums\Alignment;

Builder::make('content')
    ->schema([
        // ...
    ])
    ->addActionAlignment(Alignment::Start)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `addActionAlignment()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/builder/add-action-alignment" alt="Builder with add action aligned to the start" version="5.x" />

### Preventing the user from adding items

You may prevent the user from adding items to the builder using the `addable(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->addable(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `addable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Deleting items

An action button is displayed on each item to allow the user to delete it.

### Preventing the user from deleting items

You may prevent the user from deleting items from the builder using the `deletable(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->deletable(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `deletable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Reordering items

A button is displayed on each item to allow the user to drag and drop to reorder it in the list.

### Preventing the user from reordering items

You may prevent the user from reordering items from the builder using the `reorderable(false)` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->reorderable(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `reorderable()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Reordering items with buttons

You may use the `reorderableWithButtons()` method to enable reordering items with buttons to move the item up and down:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->reorderableWithButtons()
```

<AutoScreenshot name="forms/fields/builder/reorderable-with-buttons" alt="Builder that is reorderable with buttons" version="5.x" />

Optionally, you may pass a boolean value to control if the builder should be ordered with buttons or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->reorderableWithButtons(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `reorderableWithButtons()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

### Preventing reordering with drag and drop

You may use the `reorderableWithDragAndDrop(false)` method to prevent items from being ordered with drag and drop:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->reorderableWithDragAndDrop(false)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `reorderableWithDragAndDrop()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Collapsing items

The builder may be `collapsible()` to optionally hide content in long forms:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->collapsible()
```

<AutoScreenshot name="forms/fields/builder/collapsible" alt="Collapsible builder" version="5.x" />

You may also collapse all items by default:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->collapsed()
```

<AutoScreenshot name="forms/fields/builder/collapsed" alt="Collapsed builder" version="5.x" />

Optionally, the `collapsible()` and `collapsed()` methods accept a boolean value to control if the builder should be collapsible and collapsed or not:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->collapsible(FeatureFlag::active())
    ->collapsed(FeatureFlag::active())
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `collapsible()` and `collapsed()` methods also accept functions to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Cloning items

You may allow builder items to be duplicated using the `cloneable()` method:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->cloneable()
```

<AutoScreenshot name="forms/fields/builder/cloneable" alt="Cloneable repeater" version="5.x" />

## Customizing the block picker

### Changing the number of columns in the block picker

The block picker has only 1 column. You may customize it by passing a number of columns to `blockPickerColumns()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make()
    ->blockPickerColumns(2)
    ->blocks([
        // ...
    ])
```

This method can be used in a couple of different ways:

* You can pass an integer like `blockPickerColumns(2)`. This integer is the number of columns used on the `lg` breakpoint and higher. All smaller devices will have just 1 column.
* You can pass an array, where the key is the breakpoint and the value is the number of columns. For example, `blockPickerColumns(['md' => 2, 'xl' => 4])` will create a 2 column layout on medium devices, and a 4 column layout on extra large devices. The default breakpoint for smaller devices uses 1 column, unless you use a `default` array key.

Breakpoints (`sm`, `md`, `lg`, `xl`, `2xl`) are defined by Tailwind, and can be found in the [Tailwind documentation](https://tailwindcss.com/docs/responsive-design#overview).

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `blockPickerColumns()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

<AutoScreenshot name="forms/fields/builder/block-picker-columns" alt="Builder with 2 block picker columns" version="5.x" />

### Increasing the width of the block picker

When you [increase the number of columns](#changing-the-number-of-columns-in-the-block-picker), the width of the dropdown should increase incrementally to handle the additional columns. If you'd like more control, you can manually set a maximum width for the dropdown using the `blockPickerWidth()` method. Options correspond to [Tailwind's max-width scale](https://tailwindcss.com/docs/max-width). The options are `xs`, `sm`, `md`, `lg`, `xl`, `2xl`, `3xl`, `4xl`, `5xl`, `6xl`, `7xl`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make()
    ->blockPickerColumns(3)
    ->blockPickerWidth('2xl')
    ->blocks([
        // ...
    ])
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `blockPickerWidth()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Limiting the number of times a block can be used

By default, each block can be used in the builder an unlimited number of times. You may limit this using the `maxItems()` method on a block:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder\Block;

Block::make('heading')
    ->schema([
        // ...
    ])
    ->maxItems(1)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing a static value, the `maxItems()` method also accepts a function to dynamically calculate it. You can inject various utilities into the function as parameters.</UtilityInjection>

## Using `$get()` to access parent field values

All form components are able to [use `$get()` and `$set()`](./overview#injecting-the-state-of-another-field) to access another field's value. However, you might experience unexpected behavior when using this inside the builder's schema.

This is because `$get()` and `$set()`, by default, are scoped to the current builder item. This means that you are able to interact with another field inside that builder item easily without knowing which builder item the current form component belongs to.

The consequence of this is that you may be confused when you are unable to interact with a field outside the builder. We use `../` syntax to solve this problem - `$get('../parent_field_name')`.

Consider your form has this data structure:

```php theme={"theme":"gruvbox-dark-hard"}
[
    'client_id' => 1,

    'builder' => [
        'item1' => [
            'service_id' => 2,
        ],
    ],
]
```

You are trying to retrieve the value of `client_id` from inside the builder item.

`$get()` is relative to the current builder item, so `$get('client_id')` is looking for `$get('builder.item1.client_id')`.

You can use `../` to go up a level in the data structure, so `$get('../client_id')` is `$get('builder.client_id')` and `$get('../client_id')` is `$get('client_id')`.

The special case of `$get()` with no arguments, or `$get('')` or `$get('./')`, will always return the full data array for the current builder item.

## Builder validation

As well as all rules listed on the [validation](./validation) page, there are additional rules that are specific to builders.

### Number of items validation

You can validate the minimum and maximum number of items that you can have in a builder by setting the `minItems()` and `maxItems()` methods:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->minItems(1)
    ->maxItems(5)
```

<UtilityInjection set="formFields" version="5.x">As well as allowing static values, the `minItems()` and `maxItems()` methods also accept a function to dynamically calculate them. You can inject various utilities into the function as parameters.</UtilityInjection>

## Customizing the builder item actions

This field uses action objects for easy customization of buttons within it. You can customize these buttons by passing a function to an action registration method. The function has access to the `$action` object, which you can use to [customize it](../actions/overview). The following methods are available to customize the actions:

* `addAction()`
* `addBetweenAction()`
* `cloneAction()`
* `collapseAction()`
* `collapseAllAction()`
* `deleteAction()`
* `expandAction()`
* `expandAllAction()`
* `moveDownAction()`
* `moveUpAction()`
* `reorderAction()`

Here is an example of how you might customize an action:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->collapseAllAction(
        fn (Action $action) => $action->label('Collapse all content'),
    )
```

<UtilityInjection set="formFields" version="5.x" extras="Action;;Filament\Actions\Action;;$action;;The action object to customize.">The action registration methods can inject various utilities into the function as parameters.</UtilityInjection>

### Confirming builder actions with a modal

You can confirm actions with a modal by using the `requiresConfirmation()` method on the action object. You may use any [modal customization method](../actions/modals) to change its content and behavior:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\Builder;

Builder::make('content')
    ->blocks([
        // ...
    ])
    ->deleteAction(
        fn (Action $action) => $action->requiresConfirmation(),
    )
```

<Info>
  The `addAction()`, `addBetweenAction()`, `collapseAction()`, `collapseAllAction()`, `expandAction()`, `expandAllAction()` and `reorderAction()` methods do not support confirmation modals, as clicking their buttons does not make the network request that is required to show the modal.
</Info>

### Adding extra item actions to a builder

You may add new [action buttons](../actions) to the header of each builder item by passing `Action` objects into `extraItemActions()`:

```php theme={"theme":"gruvbox-dark-hard"}
use Filament\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Mail;

Builder::make('content')
    ->blocks([
        Block::make('contactDetails')
            ->schema([
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                // ...
            ]),
        // ...
    ])
    ->extraItemActions([
        Action::make('sendEmail')
            ->icon(Heroicon::Square2Stack)
            ->action(function (array $arguments, Builder $component): void {
                $itemData = $component->getItemState($arguments['item']);
                
                Mail::to($itemData['email'])
                    ->send(
                        // ...
                    );
            }),
    ])
```

In this example, `$arguments['item']` gives you the ID of the current builder item. You can validate the data in that builder item using the `getItemState()` method on the builder component. This method returns the validated data for the item. If the item is not valid, it will cancel the action and show an error message for that item in the form.

If you want to get the raw data from the current item without validating it, you can use `$component->getRawItemState($arguments['item'])` instead.

If you want to manipulate the raw data for the entire builder, for example, to add, remove or modify items, you can use `$component->getState()` to get the data, and `$component->state($state)` to set it again:

```php theme={"theme":"gruvbox-dark-hard"}
use Illuminate\Support\Str;

// Get the raw data for the entire builder
$state = $component->getState();

// Add an item, with a random UUID as the key
$state[Str::uuid()] = [
    'type' => 'contactDetails',
    'data' => [
        'email' => auth()->user()->email,
    ],
];

// Set the new data for the builder
$component->state($state);
```

<EditOnGitHub version="5.x" path="packages/forms/docs/13-builder.md" />

<Footer />
